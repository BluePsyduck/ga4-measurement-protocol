<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\ParameterArray;

/**
 * This event signifies an item was selected from a list.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#select_item
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
#[Event('select_item')]
class SelectItemEvent implements EventInterface
{
    /**
     * The ID of the list in which the item was presented to the user.
     * @var string|null
     */
    #[Parameter('item_list_id')]
    public ?string $itemListId = null;

    /**
     * The name of the list in which the item was presented to the user.
     * @var string|null
     */
    #[Parameter('item_list_name')]
    public ?string $itemListName = null;

    /**
     * The items for the event.
     * @var array<Item>
     */
    #[ParameterArray('items')]
    public array $items = [];
}
