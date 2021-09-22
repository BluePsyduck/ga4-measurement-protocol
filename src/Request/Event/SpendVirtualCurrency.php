<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

/**
 * This event measures the sale of virtual goods in your app and helps you identify which virtual goods are the most
 * popular.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#spend_virtual_currency
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class SpendVirtualCurrency implements EventInterface
{
    /**
     * The name of the virtual currency.
     * @var string|null
     */
    public ?string $virtualCurrencyName = null;

    /**
     * The value of the virtual currency.
     * @var float|null
     */
    public ?float $value = null;

    /**
     * The name of the item the virtual currency is being used for.
     * @var string|null
     */
    public ?string $itemName = null;

    public function getName(): string
    {
        return 'spend_virtual_currency';
    }

    public function getParams(): array
    {
        return array_filter([
            'virtual_currency_name' => $this->virtualCurrencyName,
            'value' => $this->value,
            'item_name' => $this->itemName,
        ], fn($v) => !is_null($v));
    }
}
