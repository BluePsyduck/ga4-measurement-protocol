<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

/**
 * This event signifies a user has submitted their payment information.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#add_payment_info
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class AddPaymentInfoEvent implements EventInterface
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
     * The chosen method of payment.
     * @var string|null
     */
    public ?string $paymentType = null;

    /**
     * The items for the event.
     * @var array<Item>
     */
    public array $items = [];

    public function getName(): string
    {
        return 'add_payment_info';
    }

    public function getParams(): array
    {
        return array_filter([
            'currency' => $this->currency,
            'value' => $this->value,
            'coupon' => $this->coupon,
            'payment_type' => $this->paymentType,
            'items' => $this->items,
        ], fn($v) => !is_null($v));
    }
}
