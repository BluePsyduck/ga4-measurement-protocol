<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

/**
 * This event indicates that a user has signed up for an account. Use this event to understand the different behaviors
 * of logged in and logged out users.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#sign_up
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class SignUpEvent
{
    /**
     * The method used for sign up.
     * @var string|null
     */
    public ?string $method = null;

    public function getName(): string
    {
        return 'sign_up';
    }

    public function getParams(): array
    {
        return array_filter([
            'method' => $this->method,
        ], fn($v) => !is_null($v));
    }
}
