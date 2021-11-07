<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\ParameterArray;

/**
 * The event signifies that an item was added to a wishlist. Use this event to identify popular gift items in your app.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#add_to_wishlist
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
#[Event('add_to_wishlist')]
class AddToWishlistEvent implements EventInterface
{
    /**
     * Currency of the items associated with the event, in 3-letter ISO 4217 format.
     * @var string|null
     */
    #[Parameter('currency')]
    public ?string $currency = null;

    /**
     * The monetary value of the event.
     * @var float|null
     */
    #[Parameter('value')]
    public ?float $value = null;

    /**
     * The items for the event.
     * @var array<Item>
     */
    #[ParameterArray('items')]
    public array $items = [];
}
