<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\ViewItemEvent;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The PHPUnit test of the ViewItemEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\ViewItemEvent
 */
class ViewItemEventTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $item = new Item();
        $item->itemId = 'SKU_12345';

        $event = new ViewItemEvent();
        $event->currency = 'USD';
        $event->value = 7.77;
        $event->items = [$item];

        $expectedData = [
            'name' => 'view_item',
            'params' => [
                'currency' => 'USD',
                'value' => 7.77,
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
        $event = new ViewItemEvent();

        $expectedData = [
            'name' => 'view_item',
            'params' => [
                'items' => [],
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
