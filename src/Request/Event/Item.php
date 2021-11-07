<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;
use JsonSerializable;

/**
 * The item associated with an event.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#add_payment_info_item
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class Item
{
    /**
     * The ID of the item.
     * @var string|null
     */
    #[Parameter('item_id')]
    public ?string $itemId = null;

    /**
     * The name of the item.
     * @var string|null
     */
    #[Parameter('item_name')]
    public ?string $itemName = null;

    /**
     * A product affiliation to designate a supplying company or brick and mortar store location.
     * @var string|null
     */
    #[Parameter('affiliation')]
    public ?string $affiliation = null;

    /**
     * The coupon name/code associated with the item.
     * @var string|null
     */
    #[Parameter('coupon')]
    public ?string $coupon = null;

    /**
     * The currency, in 3-letter ISO 4217 format.
     * @var string|null
     */
    #[Parameter('currency')]
    public ?string $currency = null;

    /**
     * The name of the promotional creative.
     * @var string|null
     */
    #[Parameter('creative_name')]
    public ?string $creativeName = null;

    /**
     * The name of the promotional creative slot associated with the item.
     * @var string|null
     */
    #[Parameter('creative_slot')]
    public ?string $creativeSlot = null;

    /**
     * The monetary discount value associated with the item.
     * @var float|null
     */
    #[Parameter('discount')]
    public ?float $discount = null;

    /**
     * The index/position of the item in a list.
     * @var float|null
     */
    #[Parameter('index')]
    public ?float $index = null;

    /**
     * The brand of the item.
     * @var string|null
     */
    #[Parameter('item_brand')]
    public ?string $itemBrand = null;

    /**
     * The category of the item. If used as part of a category hierarchy or taxonomy then this will be the first
     * category.
     * @var string|null
     */
    #[Parameter('item_category')]
    public ?string $itemCategory = null;

    /**
     * The second category hierarchy or additional taxonomy for the item.
     * @var string|null
     */
    #[Parameter('item_category2')]
    public ?string $itemCategory2 = null;

    /**
     * The third category hierarchy or additional taxonomy for the item.
     * @var string|null
     */
    #[Parameter('item_category3')]
    public ?string $itemCategory3 = null;

    /**
     * The fourth category hierarchy or additional taxonomy for the item.
     * @var string|null
     */
    #[Parameter('item_category4')]
    public ?string $itemCategory4 = null;

    /**
     * The fifth category hierarchy or additional taxonomy for the item.
     * @var string|null
     */
    #[Parameter('item_category5')]
    public ?string $itemCategory5 = null;

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
     * The item variant or unique code or description for additional item details/options.
     * @var string|null
     */
    #[Parameter('item_variant')]
    public ?string $itemVariant = null;

    /**
     * The location associated with the item. It's recommended to use the Google Place ID that corresponds to the
     * associated item. A custom location ID can also be used.
     * @var string|null
     */
    #[Parameter('location_id')]
    public ?string $locationId = null;

    /**
     * The monetary price of the item, in units of the specified currency parameter.
     * @var float|null
     */
    #[Parameter('price')]
    public ?float $price = null;

    /**
     * The ID of the promotion associated with the item.
     * @var string|null
     */
    #[Parameter('promotion_id')]
    public ?string $promotionId = null;

    /**
     * The name of the promotion associated with the item.
     * @var string|null
     */
    #[Parameter('promotion_name')]
    public ?string $promotionName = null;

    /**
     * Item quantity.
     * @var float|null
     */
    #[Parameter('quantity')]
    public ?float $quantity = null;
}
