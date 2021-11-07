<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\AddShippingInfoEvent;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The serializer test of the AddShippingInfoEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\AddShippingInfoEvent
 */
class AddShippingInfoEventTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $item = new Item();
        $item->itemId = 'SKU_12345';

        $event = new AddShippingInfoEvent();
        $event->currency = 'USD';
        $event->value = 7.77;
        $event->coupon = 'SUMMER_FUN';
        $event->shippingTier = 'Ground';
        $event->items = [$item];

        $expectedData = [
            'name' => 'add_shipping_info',
            'params' => [
                'currency' => 'USD',
                'value' => 7.77,
                'coupon' => 'SUMMER_FUN',
                'shipping_tier' => 'Ground',
                'items' => [
                    [
                        'item_id' => 'SKU_12345',
                    ]
                ],
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }

    public function testWithoutData(): void
    {
        $event = new AddShippingInfoEvent();

        $expectedData = [
            'name' => 'add_shipping_info',
            'params' => [
                'items' => [],
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
