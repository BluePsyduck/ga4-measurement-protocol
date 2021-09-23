<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol;

use BluePsyduck\Ga4MeasurementProtocol\Request\Payload;
use BluePsyduck\Ga4MeasurementProtocol\Response\ValidateResponse;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * The interface for the client.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
interface ClientInterface
{
    /**
     * Sends the payload to Google Analytics.
     * @param Payload $payload
     * @throws ClientExceptionInterface
     */
    public function send(Payload $payload): void;

    /**
     * Validates the payload against Google Analytics.
     * @param Payload $payload
     * @return ValidateResponse
     * @throws ClientExceptionInterface
     */
    public function validate(Payload $payload): ValidateResponse;
}
