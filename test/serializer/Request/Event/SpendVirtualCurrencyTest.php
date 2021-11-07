<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\SpendVirtualCurrency;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The PHPUnit test of the SpendVirtualCurrency class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\SpendVirtualCurrency
 */
class SpendVirtualCurrencyTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $event = new SpendVirtualCurrency();
        $event->virtualCurrencyName = 'Gems';
        $event->value = 5;
        $event->itemName = 'Starter Boots';

        $expectedData = [
            'name' => 'spend_virtual_currency',
            'params' => [
                'virtual_currency_name' => 'Gems',
                'value' => 5.,
                'item_name' => 'Starter Boots',
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }

    public function testWithoutData(): void
    {
        $event = new SpendVirtualCurrency();

        $expectedData = [
            'name' => 'spend_virtual_currency',
            'params' => [],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
