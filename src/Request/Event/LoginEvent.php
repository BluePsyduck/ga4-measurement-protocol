<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

/**
 * Send this event to signify that a user has logged in.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#login
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class LoginEvent implements EventInterface
{
    /**
     * The method used to login.
     * @var string|null
     */
    public ?string $method = null;

    public function getName(): string
    {
        return 'login';
    }

    public function getParams(): array
    {
        return array_filter([
            'method' => $this->method,
        ], fn($v) => !is_null($v));
    }
}
