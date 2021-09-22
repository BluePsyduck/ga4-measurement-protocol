<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request;

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
class Payload implements JsonSerializable
{
    /**
     * Required. Uniquely identifies a user instance of a web client.
     * @var string
     */
    public string $clientId = '';

    /**
     * Optional. A unique identifier for a user.
     * @var string|null
     */
    public ?string $userId = null;

    /**
     * Optional. A Unix timestamp (in microseconds) for the time to associate with the event.
     * @var int|null
     */
    public ?int $timestampMicros = null;

    /**
     * Optional. The user properties for the measurement.
     * @var array<string, mixed>
     */
    public array $userProperties = [];

    /**
     * Optional. Set to true to indicate these events should not be used for personalized ads.
     * @var bool|null
     */
    public ?bool $nonPersonalizedAds = null;

    /**
     * Required. An array of event items. Up to 25 events can be sent per request.
     * @var array<EventInterface>
     */
    public array $events = [];

    public function jsonSerialize()
    {
        return array_filter([
            'client_id' => $this->clientId,
            'user_ud' => $this->userId,
            'timestamp_micros' => $this->timestampMicros,
            'user_properties' => (object) $this->userProperties,
            'non_personalized_ads' => $this->nonPersonalizedAds,
            'events' => array_map(fn(EventInterface $event): array => [
                'name' => $event->getName(),
                'params' => $event->getParams(),
            ], $this->events),
        ], fn($v) => !is_null($v));
    }
}
