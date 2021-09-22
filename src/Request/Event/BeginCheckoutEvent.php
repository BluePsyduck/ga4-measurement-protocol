<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

/**
 * This event signifies that a user has begun a checkout.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#begin_checkout
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class BeginCheckoutEvent implements EventInterface
{
    /**
     * Currency of the items associated with the event, in 3-letter ISO 4217 format.
     * @var string|null
     */
    public ?string $currency = null;

    /**
     * The monetary value of the event.
     * @var float|null
     */
    public ?float $value = null;

    /**
     * The coupon name/code associated with the event.
     * @var string|null
     */
    public ?string $coupon = null;

    /**
     * The items for the event.
     * @var array<Item>
     */
    public array $items = [];

    public function getName(): string
    {
        return 'begin_checkout';
    }

    public function getParams(): array
    {
        return array_filter([
            'currency' => $this->currency,
            'value' => $this->value,
            'coupon' => $this->coupon,
            'items' => $this->items,
        ], fn($v) => !is_null($v));
    }
}
