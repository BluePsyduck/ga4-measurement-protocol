<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;

/**
 * Send this event to signify that a user has logged in.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#login
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
#[Event('login')]
class LoginEvent implements EventInterface
{
    /**
     * The method used to login.
     * @var string|null
     */
    #[Parameter('method')]
    public ?string $method = null;
}
