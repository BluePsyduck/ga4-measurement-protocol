<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\AddPaymentInfoEvent;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The serializer test of the AddPaymentInfoEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class AddPaymentInfoEventTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $item = new Item();
        $item->itemId = 'SKU_12345';

        $event = new AddPaymentInfoEvent();
        $event->currency = 'USD';
        $event->value = 7.77;
        $event->coupon = 'SUMMER_FUN';
        $event->paymentType = 'Credit Card';
        $event->items = [$item];

        $expectedData = [
            'name' => 'add_payment_info',
            'params' => [
                'currency' => 'USD',
                'value' => 7.77,
                'coupon' => 'SUMMER_FUN',
                'payment_type' => 'Credit Card',
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
        $event = new AddPaymentInfoEvent();

        $expectedData = [
            'name' => 'add_payment_info',
            'params' => [
                'items' => [],
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
