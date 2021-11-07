<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\PostScoreEvent;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The PHPUnit test of the PostScoreEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\PostScoreEvent
 */
class PostScoreEventTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $event = new PostScoreEvent();
        $event->score = 10000;
        $event->level = 5;
        $event->character = 'Player 1';

        $expectedData = [
            'name' => 'post_score',
            'params' => [
                'score' => 10000.,
                'level' => 5.,
                'character' => 'Player 1',
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }

    public function testWithoutData(): void
    {
        $event = new PostScoreEvent();

        $expectedData = [
            'name' => 'post_score',
            'params' => [],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
