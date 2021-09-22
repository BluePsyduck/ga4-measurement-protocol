<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\ViewItemListEvent;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the ViewItemListEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\ViewItemListEvent
 */
class ViewItemListEventTest extends TestCase
{
    public function testWithData(): void
    {
        $item = new Item();
        $item->itemId = 'SKU_12345';

        $event = new ViewItemListEvent();
        $event->itemListId = 'related_products';
        $event->itemListName = 'Related Products';
        $event->items = [$item];

        $expectedParams = [
            'item_list_id' => 'related_products',
            'item_list_name' => 'Related Products',
            'items' => [$item],
        ];

        $this->assertSame('view_item_list', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new ViewItemListEvent();

        $this->assertSame('view_item_list', $event->getName());
        $this->assertSame(['items' => []], $event->getParams());
    }
}
