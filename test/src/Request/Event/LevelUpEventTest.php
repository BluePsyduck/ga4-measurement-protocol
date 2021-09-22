<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\LevelUpEvent;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the LevelUpEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\LevelUpEvent
 */
class LevelUpEventTest extends TestCase
{
    public function testWithData(): void
    {
        $event = new LevelUpEvent();
        $event->level = 5;
        $event->character = 'Player 1';

        $expectedParams = [
            'level' => 5.,
            'character' => 'Player 1',
        ];

        $this->assertSame('level_up', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new LevelUpEvent();

        $this->assertSame('level_up', $event->getName());
        $this->assertSame([], $event->getParams());
    }
}
