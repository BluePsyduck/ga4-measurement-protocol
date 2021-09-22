<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\JoinGroupEvent;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the JoinGroupEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\JoinGroupEvent
 */
class JoinGroupEventTest extends TestCase
{
    public function testWithData(): void
    {
        $event = new JoinGroupEvent();
        $event->groupId = 'G_12345';

        $expectedParams = [
            'group_id' => 'G_12345',
        ];

        $this->assertSame('join_group', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new JoinGroupEvent();

        $this->assertSame('join_group', $event->getName());
        $this->assertSame([], $event->getParams());
    }
}
