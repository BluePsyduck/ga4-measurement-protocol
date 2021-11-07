<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\BeginCheckoutEvent;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The PHPUnit test of the BeginCheckoutEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\BeginCheckoutEvent
 */
class BeginCheckoutEventTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $item = new Item();
        $item->itemId = 'SKU_12345';

        $event = new BeginCheckoutEvent();
        $event->currency = 'USD';
        $event->value = 7.77;
        $event->coupon = 'SUMMER_FUN';
        $event->items = [$item];

        $expectedData = [
            'name' => 'begin_checkout',
            'params' => [
                'currency' => 'USD',
                'value' => 7.77,
                'coupon' => 'SUMMER_FUN',
                'items' => [
                    [
                        'item_id' => 'SKU_12345',
                    ],
                ],
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }

    public function testWithoutData(): void
    {
        $event = new BeginCheckoutEvent();

        $expectedData = [
            'name' => 'begin_checkout',
            'params' => [
                'items' => [],
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
