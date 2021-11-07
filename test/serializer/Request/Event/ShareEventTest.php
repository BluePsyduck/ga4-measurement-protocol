<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\ShareEvent;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The PHPUnit test of the ShareEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\ShareEvent
 */
class ShareEventTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $event = new ShareEvent();
        $event->method = 'Twitter';
        $event->contentType = 'image';
        $event->itemId = 'C_12345';

        $expectedData = [
            'name' => 'share',
            'params' => [
                'method' => 'Twitter',
                'content_type' => 'image',
                'item_id' => 'C_12345',
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }

    public function testWithoutData(): void
    {
        $event = new ShareEvent();

        $expectedData = [
            'name' => 'share',
            'params' => [],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
