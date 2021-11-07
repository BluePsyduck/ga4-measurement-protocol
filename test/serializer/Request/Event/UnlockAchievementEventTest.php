<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\UnlockAchievementEvent;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The PHPUnit test of the UnlockAchievementEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\UnlockAchievementEvent
 */
class UnlockAchievementEventTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $event = new UnlockAchievementEvent();
        $event->achievementId = 'A_12345';

        $expectedData = [
            'name' => 'unlock_achievement',
            'params' => [
                'achievement_id' => 'A_12345',
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }

    public function testWithoutData(): void
    {
        $event = new UnlockAchievementEvent();

        $expectedData = [
            'name' => 'unlock_achievement',
            'params' => [],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
