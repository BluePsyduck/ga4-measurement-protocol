<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\TutorialBeginEvent;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The PHPUnit test of the TutorialBeginEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\TutorialBeginEvent
 */
class TutorialBeginEventTest extends SerializerTestCase
{
    public function testWithoutData(): void
    {
        $event = new TutorialBeginEvent();

        $expectedData = [
            'name' => 'tutorial_begin',
            'params' => [],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
