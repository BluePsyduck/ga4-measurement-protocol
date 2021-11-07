<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\ViewItemListEvent;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The PHPUnit test of the ViewItemListEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\ViewItemListEvent
 */
class ViewItemListEventTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $item = new Item();
        $item->itemId = 'SKU_12345';

        $event = new ViewItemListEvent();
        $event->itemListId = 'related_products';
        $event->itemListName = 'Related Products';
        $event->items = [$item];

        $expectedData = [
            'name' => 'view_item_list',
            'params' => [
                'item_list_id' => 'related_products',
                'item_list_name' => 'Related Products',
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
        $event = new ViewItemListEvent();

        $expectedData = [
            'name' => 'view_item_list',
            'params' => [
                'items' => [],
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
