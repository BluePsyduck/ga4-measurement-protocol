<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;

/**
 * Send this event when the user posts a score. Use this event to understand how users are performing in your game and
 * correlate high scores with audiences or behaviors.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#post_score
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
#[Event('post_score')]
class PostScoreEvent implements EventInterface
{
    /**
     * The score to post.
     * @var float|null
     */
    #[Parameter('score')]
    public ?float $score = null;

    /**
     * The level for the score.
     * @var float|null
     */
    #[Parameter('level')]
    public ?float $level = null;

    /**
     * The character that achieved the score.
     * @var string|null
     */
    #[Parameter('character')]
    public ?string $character = null;
}
