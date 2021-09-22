<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

/**
 * This event signifies an item was selected from a list.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#select_item
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class SelectItemEvent implements EventInterface
{
    /**
     * The ID of the list in which the item was presented to the user.
     * @var string|null
     */
    public ?string $itemListId = null;

    /**
     * The name of the list in which the item was presented to the user.
     * @var string|null
     */
    public ?string $itemListName = null;

    /**
     * The items for the event.
     * @var array<Item>
     */
    public array $items = [];

    public function getName(): string
    {
        return 'select_item';
    }

    public function getParams(): array
    {
        return array_filter([
            'item_list_id' => $this->itemListId,
            'item_list_name' => $this->itemListName,
            'items' => $this->items,
        ], fn($v) => !is_null($v));
    }
}
