<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\TutorialCompleteEvent;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The PHPUnit test of the TutorialCompleteEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\TutorialCompleteEvent
 */
class TutorialCompleteEventTest extends SerializerTestCase
{
    public function testWithoutData(): void
    {
        $event = new TutorialCompleteEvent();

        $expectedData = [
            'name' => 'tutorial_complete',
            'params' => [],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
