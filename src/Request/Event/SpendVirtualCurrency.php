<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;

/**
 * This event measures the sale of virtual goods in your app and helps you identify which virtual goods are the most
 * popular.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#spend_virtual_currency
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
#[Event('spend_virtual_currency')]
class SpendVirtualCurrency implements EventInterface
{
    /**
     * The name of the virtual currency.
     * @var string|null
     */
    #[Parameter('virtual_currency_name')]
    public ?string $virtualCurrencyName = null;

    /**
     * The value of the virtual currency.
     * @var float|null
     */
    #[Parameter('value')]
    public ?float $value = null;

    /**
     * The name of the item the virtual currency is being used for.
     * @var string|null
     */
    #[Parameter('item_name')]
    public ?string $itemName = null;
}
