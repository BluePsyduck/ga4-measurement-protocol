<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\TutorialCompleteEvent;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the TutorialCompleteEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\TutorialCompleteEvent
 */
class TutorialCompleteEventTest extends TestCase
{
    public function testWithoutData(): void
    {
        $event = new TutorialCompleteEvent();

        $this->assertSame('tutorial_complete', $event->getName());
        $this->assertSame([], $event->getParams());
    }
}
