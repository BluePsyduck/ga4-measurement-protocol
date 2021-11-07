<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;

/**
 * This event signifies the start of the on-boarding process. Use this in a funnel with tutorial_complete to understand
 * how many users complete the tutorial.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#tutorial_begin
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
#[Event('tutorial_begin')]
class TutorialBeginEvent implements EventInterface
{
}
