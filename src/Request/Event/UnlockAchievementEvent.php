<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;

/**
 * Log this event when the user has unlocked an achievement. This event can help you understand how users are
 * experiencing your game.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#unlock_achievement
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
#[Event('unlock_achievement')]
class UnlockAchievementEvent implements EventInterface
{
    /**
     * The id of the achievement that was unlocked.
     * @var string|null
     */
    #[Parameter('achievement_id')]
    public ?string $achievementId = null;
}
