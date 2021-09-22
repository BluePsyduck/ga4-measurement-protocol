<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\UnlockAchievementEvent;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the UnlockAchievementEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\UnlockAchievementEvent
 */
class UnlockAchievementEventTest extends TestCase
{
    public function testWithData(): void
    {
        $event = new UnlockAchievementEvent();
        $event->achievementId = 'A_12345';

        $expectedParams = [
            'achievement_id' => 'A_12345',
        ];

        $this->assertSame('unlock_achievement', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new UnlockAchievementEvent();

        $this->assertSame('unlock_achievement', $event->getName());
        $this->assertSame([], $event->getParams());
    }
}
