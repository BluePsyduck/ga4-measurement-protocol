<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\EarnVirtualCurrencyEvent;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The PHPUnit test of the EarnVirtualCurrencyEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\EarnVirtualCurrencyEvent
 */
class EarnVirtualCurrencyEventTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $event = new EarnVirtualCurrencyEvent();
        $event->virtualCurrencyName = 'Gems';
        $event->value = 5;

        $expectedData = [
            'name' => 'earn_virtual_currency',
            'params' => [
                'virtual_currency_name' => 'Gems',
                'value' => 5.,
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }

    public function testWithoutData(): void
    {
        $event = new EarnVirtualCurrencyEvent();

        $expectedData = [
            'name' => 'earn_virtual_currency',
            'params' => [],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
