<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;

/**
 * This event indicates that a user has signed up for an account. Use this event to understand the different behaviors
 * of logged in and logged out users.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#sign_up
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
#[Event('sign_up')]
class SignUpEvent implements EventInterface
{
    /**
     * The method used for sign up.
     * @var string|null
     */
    #[Parameter('method')]
    public ?string $method = null;
}
