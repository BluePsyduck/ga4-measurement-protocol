<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\ViewItemEvent;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the ViewItemEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\ViewItemEvent
 */
class ViewItemEventTest extends TestCase
{
    public function testWithData(): void
    {
        $item = new Item();
        $item->itemId = 'SKU_12345';

        $event = new ViewItemEvent();
        $event->currency = 'USD';
        $event->value = 7.77;
        $event->items = [$item];

        $expectedParams = [
            'currency' => 'USD',
            'value' => 7.77,
            'items' => [$item],
        ];

        $this->assertSame('view_item', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new ViewItemEvent();

        $this->assertSame('view_item', $event->getName());
        $this->assertSame(['items' => []], $event->getParams());
    }
}
