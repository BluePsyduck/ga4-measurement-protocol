<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\ParameterArray;

/**
 * This event signifies that a user has begun a checkout.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#begin_checkout
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
#[Event('begin_checkout')]
class BeginCheckoutEvent implements EventInterface
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
     * The coupon name/code associated with the event.
     * @var string|null
     */
    #[Parameter('coupon')]
    public ?string $coupon = null;

    /**
     * The items for the event.
     * @var array<Item>
     */
    #[ParameterArray('items')]
    public array $items = [];
}
