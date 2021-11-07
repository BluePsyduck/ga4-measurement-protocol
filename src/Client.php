<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol;

use BluePsyduck\Ga4MeasurementProtocol\Exception\InvalidJsonResponseException;
use BluePsyduck\Ga4MeasurementProtocol\Request\Payload;
use BluePsyduck\Ga4MeasurementProtocol\Response\ValidateResponse;
use BluePsyduck\Ga4MeasurementProtocol\Response\ValidationMessage;
use BluePsyduck\Ga4MeasurementProtocol\Serializer\SerializerInterface;
use JsonException;
use Psr\Http\Client\ClientInterface as HttpClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;

/**
 * The client handling the data for the Measurement Protocol.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class Client implements ClientInterface
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
        private SerializerInterface $serializer,
        private Config $config,
    ) {
    }

    public function send(Payload $payload): void
    {
        $request = $this->createRequest($this->config->sendUrl, $payload);
        $this->httpClient->sendRequest($request);
    }

    public function validate(Payload $payload): ValidateResponse
    {
        $request = $this->createRequest($this->config->validateUrl, $payload);
        $clientResponse = $this->httpClient->sendRequest($request);

        try {
            $responseData = json_decode($clientResponse->getBody()->getContents(), true, flags: JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new InvalidJsonResponseException($e->getMessage(), $e);
        }
        return $this->createValidationResponse($responseData);
    }

    private function createRequest(string $url, Payload $payload): RequestInterface
    {
        $requestUrl = $url . '?' . http_build_query([
            'api_secret' => $this->config->apiSecret,
            'measurement_id' => $this->config->measurementId,
        ]);
        $body = $this->streamFactory->createStream($this->serializer->serialize($payload));

        return $this->requestFactory->createRequest('POST', $requestUrl)
                                    ->withHeader('Content-Type', 'application/json')
                                    ->withBody($body);
    }

    /**
     * @param mixed $responseData
     * @return ValidateResponse
     */
    private function createValidationResponse(mixed $responseData): ValidateResponse
    {
        $response = new ValidateResponse();
        if (is_array($responseData)) {
            foreach ($responseData['validationMessages'] ?? [] as $messageData) {
                $message = new ValidationMessage();
                $message->fieldPath = $messageData['fieldPath'] ?? '';
                $message->description = $messageData['description'] ?? '';
                $message->validationCode = $messageData['validationCode'] ?? '';
                $response->validationMessages[] = $message;
            }
        }
        return $response;
    }
}
