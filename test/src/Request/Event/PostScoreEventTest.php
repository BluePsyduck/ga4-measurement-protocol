<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\PostScoreEvent;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the PostScoreEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\PostScoreEvent
 */
class PostScoreEventTest extends TestCase
{
    public function testWithData(): void
    {
        $event = new PostScoreEvent();
        $event->score = 10000;
        $event->level = 5;
        $event->character = 'Player 1';

        $expectedParams = [
            'score' => 10000.,
            'level' => 5.,
            'character' => 'Player 1',
        ];

        $this->assertSame('post_score', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new PostScoreEvent();

        $this->assertSame('post_score', $event->getName());
        $this->assertSame([], $event->getParams());
    }
}
