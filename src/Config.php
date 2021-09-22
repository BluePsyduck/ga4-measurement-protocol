<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol;

/**
 * The class holding the configuration for the client.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class Config
{
    /**
     * The URL endpoint for sending the data using the Measurement Protocol.
     * @var string
     */
    public string $sendUrl = 'https://www.google-analytics.com/mp/collect';

    /**
     * The URL endpoint for validating the data against the Measurement protocol.
     * @var string
     */
    public string $validateUrl = 'https://www.google-analytics.com/debug/mp/collect';

    /**
     * The API secret to use in the requests.
     * @var string
     */
    public string $apiSecret = '';

    /**
     * The measurement ID to use in the requests.
     * @var string
     */
    public string $measurementId = '';
}
