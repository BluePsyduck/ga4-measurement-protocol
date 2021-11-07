<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\ParameterArray;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\EventInterface;
use JsonSerializable;

/**
 * The class representing the payload of a measurement protocol request.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference?client_type=gtag#payload_post_body
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class Payload
{
    /**
     * Required. Uniquely identifies a user instance of a web client.
     * @var string|null
     */
    #[Parameter('client_id')]
    public ?string $clientId = null;

    /**
     * Optional. A unique identifier for a user.
     * @var string|null
     */
    #[Parameter('user_id')]
    public ?string $userId = null;

    /**
     * Optional. A Unix timestamp (in microseconds) for the time to associate with the event.
     * @var int|null
     */
    #[Parameter('timestamp_micros')]
    public ?int $timestampMicros = null;

    /**
     * Optional. The user properties for the measurement.
     * @var array<string, mixed>
     */
    #[Parameter('user_properties')]
    public array $userProperties = [];

    /**
     * Optional. Set to true to indicate these events should not be used for personalized ads.
     * @var bool|null
     */
    #[Parameter('non_personalized_ads')]
    public ?bool $nonPersonalizedAds = null;

    /**
     * Required. An array of event items. Up to 25 events can be sent per request.
     * @var array<EventInterface>
     */
    #[ParameterArray('events')]
    public array $events = [];
}
