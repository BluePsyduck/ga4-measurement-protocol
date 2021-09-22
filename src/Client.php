<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol;

use BluePsyduck\Ga4MeasurementProtocol\Request\Payload;
use BluePsyduck\Ga4MeasurementProtocol\Response\ValidateResponse;
use BluePsyduck\Ga4MeasurementProtocol\Response\ValidationMessage;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;

/**
 * The client handling the data for the Measurement Protocol.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class Client
{
    public function __construct(
        private ClientInterface $httpClient,
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
        private Config $config,
    ) {
    }

    /**
     * Sends the payload to Google Analytics.
     * @param Payload $payload
     * @throws ClientExceptionInterface
     */
    public function send(Payload $payload): void
    {
        $request = $this->createRequest($this->config->sendUrl, $payload);
        $this->httpClient->sendRequest($request);
    }

    /**
     * Validates the payload against Google Analytics.
     * @param Payload $payload
     * @return ValidateResponse
     * @throws ClientExceptionInterface
     */
    public function validate(Payload $payload): ValidateResponse
    {
        $request = $this->createRequest($this->config->validateUrl, $payload);
        $clientResponse = $this->httpClient->sendRequest($request);

        $responseData = json_decode($clientResponse->getBody()->getContents(), true);
        return $this->createValidationResponse($responseData);
    }

    private function createRequest(string $url, Payload $payload): RequestInterface
    {
        $requestUrl = $url . '?' . http_build_query([
            'api_secret' => $this->config->apiSecret,
            'measurement_id' => $this->config->measurementId,
        ]);

        return $this->requestFactory->createRequest('POST', $requestUrl)
            ->withHeader('Content-Type', 'application/json')
            ->withBody($this->streamFactory->createStream((string) json_encode($payload)));
    }

    /**
     * @param array<string, mixed> $responseData
     * @return ValidateResponse
     */
    private function createValidationResponse(array $responseData): ValidateResponse
    {
        $response = new ValidateResponse();
        foreach ($responseData['validationMessages'] ?? [] as $messageData) {
            $message = new ValidationMessage();
            $message->fieldPath = $messageData['fieldPath'] ?? '';
            $message->description = $messageData['description'] ?? '';
            $message->validationCode = $messageData['validationCode'] ?? '';
            $response->validationMessages[] = $message;
        }
        return $response;
    }
}
