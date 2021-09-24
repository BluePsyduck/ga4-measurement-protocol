<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol;

use BluePsyduck\Ga4MeasurementProtocol\Client;
use BluePsyduck\Ga4MeasurementProtocol\Config;
use BluePsyduck\Ga4MeasurementProtocol\Constant\ValidationCode;
use BluePsyduck\Ga4MeasurementProtocol\Exception\InvalidJsonResponseException;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\LoginEvent;
use BluePsyduck\Ga4MeasurementProtocol\Request\Payload;
use BluePsyduck\Ga4MeasurementProtocol\Response\ValidateResponse;
use BluePsyduck\Ga4MeasurementProtocol\Response\ValidationMessage;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

/**
 * The PHPUnit test of the Client class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Client
 */
class ClientTest extends TestCase
{
    /** @var ClientInterface&MockObject */
    private ClientInterface $httpClient;
    /** @var RequestFactoryInterface&MockObject */
    private RequestFactoryInterface $requestFactory;
    /** @var StreamFactoryInterface&MockObject */
    private StreamFactoryInterface $streamFactory;
    private Config $config;

    protected function setUp(): void
    {
        $this->httpClient = $this->createMock(ClientInterface::class);
        $this->requestFactory = $this->createMock(RequestFactoryInterface::class);
        $this->streamFactory = $this->createMock(StreamFactoryInterface::class);
        $this->config = new Config();
    }

    /**
     * @param array<string> $mockedMethods
     * @return Client&MockObject
     */
    private function createInstance(array $mockedMethods = []): Client
    {
        return $this->getMockBuilder(Client::class)
                    ->disableProxyingToOriginalMethods()
                    ->onlyMethods($mockedMethods)
                    ->setConstructorArgs([
                        $this->httpClient,
                        $this->requestFactory,
                        $this->streamFactory,
                        $this->config,
                    ])
                    ->getMock();
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function testSend(): void
    {
        $this->config->apiSecret = 'abc';
        $this->config->measurementId = 'def';

        $event = new LoginEvent();
        $event->method = 'Google';
        $payload = new Payload();
        $payload->clientId = 'client_id';
        $payload->events = [$event];

        $expectedRequestUrl = 'https://www.google-analytics.com/mp/collect?api_secret=abc&measurement_id=def';
        $expectedPayload = (string) json_encode([
            'client_id' => 'client_id',
            'user_properties' => (object) [],
            'events' => [
                [
                    'name' => 'login',
                    'params' => [
                        'method' => 'Google',
                    ],
                ],
            ],
        ]);

        $stream = $this->createMock(StreamInterface::class);

        $request = $this->createMock(RequestInterface::class);
        $request->expects($this->once())
                ->method('withHeader')
                ->with($this->identicalTo('Content-Type'), $this->identicalTo('application/json'))
                ->willReturnSelf();
        $request->expects($this->once())
                ->method('withBody')
                ->with($this->identicalTo($stream))
                ->willReturnSelf();

        $this->requestFactory->expects($this->once())
                             ->method('createRequest')
                             ->with($this->identicalTo('POST'), $this->identicalTo($expectedRequestUrl))
                             ->willReturn($request);

        $this->streamFactory->expects($this->once())
                            ->method('createStream')
                            ->with($this->identicalTo($expectedPayload))
                            ->willReturn($stream);

        $this->httpClient->expects($this->once())
                         ->method('sendRequest')
                         ->with($this->identicalTo($request));

        $instance = $this->createInstance();
        $instance->send($payload);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function testValidate(): void
    {
        $this->config->apiSecret = 'abc';
        $this->config->measurementId = 'def';

        $event = new LoginEvent();
        $event->method = 'Google';
        $payload = new Payload();
        $payload->events = [$event];

        $exampleResponse = <<<EOT
        {
          "validationMessages": [
            {
              "fieldPath": "client_id",
              "description": "Measurement requires a client_id.",
              "validationCode": "VALUE_REQUIRED"
            }
          ]
        }
        EOT;
        $clientResponseBody = $this->createMock(StreamInterface::class);
        $clientResponseBody->expects($this->once())
                           ->method('getContents')
                           ->willReturn($exampleResponse);
        $clientResponse = $this->createMock(ResponseInterface::class);
        $clientResponse->expects($this->once())
                       ->method('getBody')
                       ->willReturn($clientResponseBody);

        $expectedRequestUrl = 'https://www.google-analytics.com/debug/mp/collect?api_secret=abc&measurement_id=def';
        $expectedPayload = (string) json_encode([
            'user_properties' => (object) [],
            'events' => [
                [
                    'name' => 'login',
                    'params' => [
                        'method' => 'Google',
                    ],
                ],
            ],
        ]);
        $expectedValidationMessage = new ValidationMessage();
        $expectedValidationMessage->fieldPath = 'client_id';
        $expectedValidationMessage->description = 'Measurement requires a client_id.';
        $expectedValidationMessage->validationCode = ValidationCode::VALUE_REQUIRED;
        $expectedResponse = new ValidateResponse();
        $expectedResponse->validationMessages = [$expectedValidationMessage];

        $stream = $this->createMock(StreamInterface::class);

        $request = $this->createMock(RequestInterface::class);
        $request->expects($this->once())
                ->method('withHeader')
                ->with($this->identicalTo('Content-Type'), $this->identicalTo('application/json'))
                ->willReturnSelf();
        $request->expects($this->once())
                ->method('withBody')
                ->with($this->identicalTo($stream))
                ->willReturnSelf();

        $this->requestFactory->expects($this->once())
                             ->method('createRequest')
                             ->with($this->identicalTo('POST'), $this->identicalTo($expectedRequestUrl))
                             ->willReturn($request);

        $this->streamFactory->expects($this->once())
                            ->method('createStream')
                            ->with($this->identicalTo($expectedPayload))
                            ->willReturn($stream);

        $this->httpClient->expects($this->once())
                         ->method('sendRequest')
                         ->with($this->identicalTo($request))
                         ->willReturn($clientResponse);

        $instance = $this->createInstance();
        $response = $instance->validate($payload);

        $this->assertEquals($expectedResponse, $response);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function testValidateWithInvalidResponse(): void
    {
        $this->config->apiSecret = 'abc';
        $this->config->measurementId = 'def';

        $event = new LoginEvent();
        $event->method = 'Google';
        $payload = new Payload();
        $payload->events = [$event];

        $clientResponseBody = $this->createMock(StreamInterface::class);
        $clientResponseBody->expects($this->once())
                           ->method('getContents')
                           ->willReturn('{"invalid"');
        $clientResponse = $this->createMock(ResponseInterface::class);
        $clientResponse->expects($this->once())
                       ->method('getBody')
                       ->willReturn($clientResponseBody);

        $expectedRequestUrl = 'https://www.google-analytics.com/debug/mp/collect?api_secret=abc&measurement_id=def';
        $expectedPayload = (string) json_encode([
            'user_properties' => (object) [],
            'events' => [
                [
                    'name' => 'login',
                    'params' => [
                        'method' => 'Google',
                    ],
                ],
            ],
        ]);
        $expectedValidationMessage = new ValidationMessage();
        $expectedValidationMessage->fieldPath = 'client_id';
        $expectedValidationMessage->description = 'Measurement requires a client_id.';
        $expectedValidationMessage->validationCode = ValidationCode::VALUE_REQUIRED;
        $expectedResponse = new ValidateResponse();
        $expectedResponse->validationMessages = [$expectedValidationMessage];

        $stream = $this->createMock(StreamInterface::class);

        $request = $this->createMock(RequestInterface::class);
        $request->expects($this->once())
                ->method('withHeader')
                ->with($this->identicalTo('Content-Type'), $this->identicalTo('application/json'))
                ->willReturnSelf();
        $request->expects($this->once())
                ->method('withBody')
                ->with($this->identicalTo($stream))
                ->willReturnSelf();

        $this->requestFactory->expects($this->once())
                             ->method('createRequest')
                             ->with($this->identicalTo('POST'), $this->identicalTo($expectedRequestUrl))
                             ->willReturn($request);

        $this->streamFactory->expects($this->once())
                            ->method('createStream')
                            ->with($this->identicalTo($expectedPayload))
                            ->willReturn($stream);

        $this->httpClient->expects($this->once())
                         ->method('sendRequest')
                         ->with($this->identicalTo($request))
                         ->willReturn($clientResponse);

        $this->expectException(InvalidJsonResponseException::class);

        $instance = $this->createInstance();
        $instance->validate($payload);
    }
}
