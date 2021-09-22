<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

/**
 * This event signifies that a player has leveled up. Use it to gauge the level distribution of your userbase and
 * identify levels that are difficult to complete.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#level_up
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class LevelUpEvent implements EventInterface
{
    /**
     * The level of the character.
     * @var float|null
     */
    public ?float $level = null;

    /**
     * The character that leveled up.
     * @var string|null
     */
    public ?string $character = null;

    public function getName(): string
    {
        return 'level_up';
    }

    public function getParams(): array
    {
        return array_filter([
            'level' => $this->level,
            'character' => $this->character,
        ], fn($v) => !is_null($v));
    }
}
