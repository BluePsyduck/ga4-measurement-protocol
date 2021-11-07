<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\SearchEvent;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The PHPUnit test of the SearchEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\SearchEvent
 */
class SearchEventTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $event = new SearchEvent();
        $event->searchTerm = 't-shirts';

        $expectedData = [
            'name' => 'search',
            'params' => [
                'search_term' => 't-shirts',
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }

    public function testWithoutData(): void
    {
        $event = new SearchEvent();

        $expectedData = [
            'name' => 'search',
            'params' => [],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
