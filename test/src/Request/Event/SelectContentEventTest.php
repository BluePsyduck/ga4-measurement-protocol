<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\SelectContentEvent;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the SelectContentEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\SelectContentEvent
 */
class SelectContentEventTest extends TestCase
{
    public function testWithData(): void
    {
        $event = new SelectContentEvent();
        $event->contentType = 'product';
        $event->itemId = 'I_12345';

        $expectedParams = [
            'content_type' => 'product',
            'item_id' => 'I_12345',
        ];

        $this->assertSame('select_content', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new SelectContentEvent();

        $this->assertSame('select_content', $event->getName());
        $this->assertSame([], $event->getParams());
    }
}
