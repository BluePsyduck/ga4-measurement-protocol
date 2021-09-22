<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\SpendVirtualCurrency;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the SpendVirtualCurrency class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\SpendVirtualCurrency
 */
class SpendVirtualCurrencyTest extends TestCase
{
    public function testWithData(): void
    {
        $event = new SpendVirtualCurrency();
        $event->virtualCurrencyName = 'Gems';
        $event->value = 5;
        $event->itemName = 'Starter Boots';

        $expectedParams = [
            'virtual_currency_name' => 'Gems',
            'value' => 5.,
            'item_name' => 'Starter Boots',
        ];

        $this->assertSame('spend_virtual_currency', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new SpendVirtualCurrency();

        $this->assertSame('spend_virtual_currency', $event->getName());
        $this->assertSame([], $event->getParams());
    }
}
