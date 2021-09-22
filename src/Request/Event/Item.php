<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

use JsonSerializable;

/**
 * The item associated with an event.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#add_payment_info_item
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class Item implements JsonSerializable
{
    /**
     * The ID of the item.
     * @var string|null
     */
    public ?string $itemId = null;

    /**
     * The name of the item.
     * @var string|null
     */
    public ?string $itemName = null;

    /**
     * A product affiliation to designate a supplying company or brick and mortar store location.
     * @var string|null
     */
    public ?string $affiliation = null;

    /**
     * The coupon name/code associated with the item.
     * @var string|null
     */
    public ?string $coupon = null;

    /**
     * The currency, in 3-letter ISO 4217 format.
     * @var string|null
     */
    public ?string $currency = null;

    /**
     * The name of the promotional creative.
     * @var string|null
     */
    public ?string $creativeName = null;

    /**
     * The name of the promotional creative slot associated with the item.
     * @var string|null
     */
    public ?string $creativeSlot = null;

    /**
     * The monetary discount value associated with the item.
     * @var float|null
     */
    public ?float $discount = null;

    /**
     * The index/position of the item in a list.
     * @var int|null
     */
    public ?float $index = null;

    /**
     * The brand of the item.
     * @var string|null
     */
    public ?string $itemBrand = null;

    /**
     * The category of the item. If used as part of a category hierarchy or taxonomy then this will be the first
     * category.
     * @var string|null
     */
    public ?string $itemCategory = null;

    /**
     * The second category hierarchy or additional taxonomy for the item.
     * @var string|null
     */
    public ?string $itemCategory2 = null;

    /**
     * The third category hierarchy or additional taxonomy for the item.
     * @var string|null
     */
    public ?string $itemCategory3 = null;

    /**
     * The fourth category hierarchy or additional taxonomy for the item.
     * @var string|null
     */
    public ?string $itemCategory4 = null;

    /**
     * The fifth category hierarchy or additional taxonomy for the item.
     * @var string|null
     */
    public ?string $itemCategory5 = null;

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
     * The item variant or unique code or description for additional item details/options.
     * @var string|null
     */
    public ?string $itemVariant = null;

    /**
     * The location associated with the item. It's recommended to use the Google Place ID that corresponds to the
     * associated item. A custom location ID can also be used.
     * @var string|null
     */
    public ?string $locationId = null;

    /**
     * The monetary price of the item, in units of the specified currency parameter.
     * @var float|null
     */
    public ?float $price = null;

    /**
     * The ID of the promotion associated with the item.
     * @var string|null
     */
    public ?string $promotionId = null;

    /**
     * The name of the promotion associated with the item.
     * @var string|null
     */
    public ?string $promotionName = null;

    /**
     * Item quantity.
     * @var float|null
     */
    public ?float $quantity = null;

    public function jsonSerialize()
    {
        return array_filter([
            'item_id' => $this->itemId,
            'item_name' => $this->itemName,
            'affiliation' => $this->affiliation,
            'coupon' => $this->coupon,
            'currency' => $this->currency,
            'creative_name' => $this->creativeName,
            'creative_slot' => $this->creativeSlot,
            'discount' => $this->discount,
            'index' => $this->index,
            'item_brand' => $this->itemBrand,
            'item_category' => $this->itemCategory,
            'item_category2' => $this->itemCategory2,
            'item_category3' => $this->itemCategory3,
            'item_category4' => $this->itemCategory4,
            'item_category5' => $this->itemCategory5,
            'item_list_id' => $this->itemListId,
            'item_list_name' => $this->itemListName,
            'item_variant' => $this->itemVariant,
            'location_id' => $this->locationId,
            'price' => $this->price,
            'promotion_id' => $this->promotionId,
            'promotion_name' => $this->promotionName,
            'quantity' => $this->quantity,
        ], fn($v) => !is_null($v));
    }
}
