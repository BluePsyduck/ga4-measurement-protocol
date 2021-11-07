<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;

/**
 * This event signifies that a player has leveled up. Use it to gauge the level distribution of your userbase and
 * identify levels that are difficult to complete.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#level_up
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
#[Event('level_up')]
class LevelUpEvent implements EventInterface
{
    /**
     * The level of the character.
     * @var float|null
     */
    #[Parameter('level')]
    public ?float $level = null;

    /**
     * The character that leveled up.
     * @var string|null
     */
    #[Parameter('character')]
    public ?string $character = null;
}
