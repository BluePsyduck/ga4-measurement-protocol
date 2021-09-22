<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\TutorialBeginEvent;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the TutorialBeginEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\TutorialBeginEvent
 */
class TutorialBeginEventTest extends TestCase
{
    public function testWithoutData(): void
    {
        $event = new TutorialBeginEvent();

        $this->assertSame('tutorial_begin', $event->getName());
        $this->assertSame([], $event->getParams());
    }
}
