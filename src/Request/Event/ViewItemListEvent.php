<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

/**
 * Log this event when the user has been presented with a list of items of a certain category.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#view_item_list
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class ViewItemListEvent implements EventInterface
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
        return 'view_item_list';
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
