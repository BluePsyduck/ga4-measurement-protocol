<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\RefundEvent;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The PHPUnit test of the RefundEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\RefundEvent
 */
class RefundEventTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $item = new Item();
        $item->itemId = 'SKU_12345';

        $event = new RefundEvent();
        $event->currency = 'USD';
        $event->transactionId = 'T_12345';
        $event->value = 12.21;
        $event->affiliation = 'Google Store';
        $event->coupon = 'SUMMER_FUN';
        $event->shipping = 3.33;
        $event->tax = 1.11;
        $event->items = [$item];

        $expectedData = [
            'name' => 'refund',
            'params' => [
                'currency' => 'USD',
                'transaction_id' => 'T_12345',
                'value' => 12.21,
                'affiliation' => 'Google Store',
                'coupon' => 'SUMMER_FUN',
                'shipping' => 3.33,
                'tax' => 1.11,
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
        $event = new RefundEvent();

        $expectedData = [
            'name' => 'refund',
            'params' => [
                'items' => [],
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
