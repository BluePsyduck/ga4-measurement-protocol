<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\SelectItemEvent;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the SelectItemEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\SelectItemEvent
 */
class SelectItemEventTest extends TestCase
{
    public function testWithData(): void
    {
        $item = new Item();
        $item->itemId = 'SKU_12345';

        $event = new SelectItemEvent();
        $event->itemListId = 'related_products';
        $event->itemListName = 'Related Products';
        $event->items = [$item];

        $expectedParams = [
            'item_list_id' => 'related_products',
            'item_list_name' => 'Related Products',
            'items' => [$item],
        ];

        $this->assertSame('select_item', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new SelectItemEvent();

        $this->assertSame('select_item', $event->getName());
        $this->assertSame(['items' => []], $event->getParams());
    }
}
