<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\SearchEvent;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the SearchEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\SearchEvent
 */
class SearchEventTest extends TestCase
{
    public function testWithData(): void
    {
        $event = new SearchEvent();
        $event->searchTerm = 't-shirts';

        $expectedParams = [
            'search_term' => 't-shirts',
        ];

        $this->assertSame('search', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new SearchEvent();

        $this->assertSame('search', $event->getName());
        $this->assertSame([], $event->getParams());
    }
}
