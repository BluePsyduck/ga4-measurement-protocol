<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

/**
 * This event measures the awarding of virtual currency. Log this along with spend_virtual_currency to better
 * understand your virtual economy.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#earn_virtual_currency
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class EarnVirtualCurrencyEvent implements EventInterface
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

    public function getName(): string
    {
        return 'earn_virtual_currency';
    }

    public function getParams(): array
    {
        return array_filter([
            'virtual_currency_name' => $this->virtualCurrencyName,
            'value' => $this->value,
        ], fn($v) => !is_null($v));
    }
}
