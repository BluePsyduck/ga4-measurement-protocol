<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

/**
 * Send this event when the user posts a score. Use this event to understand how users are performing in your game and
 * correlate high scores with audiences or behaviors.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#post_score
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class PostScoreEvent implements EventInterface
{
    /**
     * The score to post.
     * @var float|null
     */
    public ?float $score = null;

    /**
     * The level for the score.
     * @var float|null
     */
    public ?float $level = null;

    /**
     * The character that achieved the score.
     * @var string|null
     */
    public ?string $character = null;

    public function getName(): string
    {
        return 'post_score';
    }

    public function getParams(): array
    {
        return array_filter([
            'score' => $this->score,
            'level' => $this->level,
            'character' => $this->character,
        ], fn($v) => !is_null($v));
    }
}
