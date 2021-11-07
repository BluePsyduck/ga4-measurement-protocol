<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\SelectContentEvent;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The PHPUnit test of the SelectContentEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\SelectContentEvent
 */
class SelectContentEventTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $event = new SelectContentEvent();
        $event->contentType = 'product';
        $event->itemId = 'I_12345';

        $expectedData = [
            'name' => 'select_content',
            'params' => [
                'content_type' => 'product',
                'item_id' => 'I_12345',
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }

    public function testWithoutData(): void
    {
        $event = new SelectContentEvent();

        $expectedData = [
            'name' => 'select_content',
            'params' => [],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
