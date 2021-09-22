<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

/**
 * Log this event when a user joins a group such as a guild, team, or family. Use this event to analyze how popular
 * certain groups or social features are.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#join_group
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class JoinGroupEvent implements EventInterface
{
    /**
     * The ID of the group.
     * @var string|null
     */
    public ?string $groupId = null;

    public function getName(): string
    {
        return 'join_group';
    }

    public function getParams(): array
    {
        return array_filter([
            'group_id' => $this->groupId,
        ], fn($v) => !is_null($v));
    }
}
