<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\ParameterArray;

/**
 * This event signifies when one or more items is purchased by a user.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#purchase
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
#[Event('purchase')]
class PurchaseEvent implements EventInterface
{
    /**
     * Currency of the items associated with the event, in 3-letter ISO 4217 format.
     * @var string|null
     */
    #[Parameter('currency')]
    public ?string $currency = null;

    /**
     * The unique identifier of a transaction.
     * @var string|null
     */
    #[Parameter('transaction_id')]
    public ?string $transactionId = null;

    /**
     * The monetary value of the event.
     * @var float|null
     */
    #[Parameter('value')]
    public ?float $value = null;

    /**
     * A product affiliation to designate a supplying company or brick and mortar store location.
     * @var string|null
     */
    #[Parameter('affiliation')]
    public ?string $affiliation = null;

    /**
     * The coupon name/code associated with the event.
     * @var string|null
     */
    #[Parameter('coupon')]
    public ?string $coupon = null;

    /**
     * Shipping cost associated with a transaction.
     * @var float|null
     */
    #[Parameter('shipping')]
    public ?float $shipping = null;

    /**
     * Tax cost associated with a transaction.
     * @var float|null
     */
    #[Parameter('tax')]
    public ?float $tax = null;

    /**
     * The items for the event.
     * @var array<Item>
     */
    #[ParameterArray('items')]
    public array $items = [];
}
