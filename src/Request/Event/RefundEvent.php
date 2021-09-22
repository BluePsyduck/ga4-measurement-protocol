<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

/**
 * This event signifies a refund was issued.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#refund
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class RefundEvent
{
    /**
     * Currency of the items associated with the event, in 3-letter ISO 4217 format.
     * @var string|null
     */
    public ?string $currency = null;

    /**
     * The unique identifier of a transaction.
     * @var string|null
     */
    public ?string $transactionId = null;

    /**
     * The monetary value of the event.
     * @var float|null
     */
    public ?float $value = null;

    /**
     * A product affiliation to designate a supplying company or brick and mortar store location.
     * @var string|null
     */
    public ?string $affiliation = null;

    /**
     * The coupon name/code associated with the event.
     * @var string|null
     */
    public ?string $coupon = null;

    /**
     * Shipping cost associated with a transaction.
     * @var float|null
     */
    public ?float $shipping = null;

    /**
     * Tax cost associated with a transaction.
     * @var float|null
     */
    public ?float $tax = null;

    /**
     * The items for the event.
     * @var array<Item>
     */
    public array $items = [];

    public function getName(): string
    {
        return 'refund';
    }

    public function getParams(): array
    {
        return array_filter([
            'currency' => $this->currency,
            'transaction_id' => $this->transactionId,
            'value' => $this->value,
            'affiliation' => $this->affiliation,
            'coupon' => $this->coupon,
            'shipping' => $this->shipping,
            'tax' => $this->tax,
            'items' => $this->items,
        ], fn($v) => !is_null($v));
    }
}
