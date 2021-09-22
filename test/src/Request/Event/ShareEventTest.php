<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\ShareEvent;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the ShareEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\ShareEvent
 */
class ShareEventTest extends TestCase
{
    public function testWithData(): void
    {
        $event = new ShareEvent();
        $event->method = 'Twitter';
        $event->contentType = 'image';
        $event->itemId = 'C_12345';

        $expectedParams = [
            'method' => 'Twitter',
            'content_type' => 'image',
            'item_id' => 'C_12345',
        ];

        $this->assertSame('share', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new ShareEvent();

        $this->assertSame('share', $event->getName());
        $this->assertSame([], $event->getParams());
    }
}
