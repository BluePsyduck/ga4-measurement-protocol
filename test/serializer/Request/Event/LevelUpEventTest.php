<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\LevelUpEvent;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The serializer test of the LevelUpEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class LevelUpEventTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $event = new LevelUpEvent();
        $event->level = 5;
        $event->character = 'Player 1';

        $expectedData = [
            'name' => 'level_up',
            'params' => [
                'level' => 5.,
                'character' => 'Player 1',
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }

    public function testWithoutData(): void
    {
        $event = new LevelUpEvent();

        $expectedData = [
            'name' => 'level_up',
            'params' => [],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
