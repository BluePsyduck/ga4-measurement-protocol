<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;

/**
 * This event measures the awarding of virtual currency. Log this along with spend_virtual_currency to better
 * understand your virtual economy.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#earn_virtual_currency
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
#[Event('earn_virtual_currency')]
class EarnVirtualCurrencyEvent implements EventInterface
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
}
