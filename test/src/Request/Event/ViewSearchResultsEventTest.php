<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\ViewSearchResultsEvent;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the ViewSearchResultsEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\ViewSearchResultsEvent
 */
class ViewSearchResultsEventTest extends TestCase
{
    public function testWithData(): void
    {
        $item = new Item();
        $item->itemId = 'SKU_12345';

        $event = new ViewSearchResultsEvent();
        $event->searchTerm = 'Clothing';
        $event->items = [$item];

        $expectedParams = [
            'search_term' => 'Clothing',
            'items' => [$item],
        ];

        $this->assertSame('view_search_results', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new ViewSearchResultsEvent();

        $this->assertSame('view_search_results', $event->getName());
        $this->assertSame(['items' => []], $event->getParams());
    }
}
