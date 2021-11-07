<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\SignUpEvent;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The PHPUnit test of the SignUpEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\SignUpEvent
 */
class SignUpEventTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $event = new SignUpEvent();
        $event->method = 'Google';

        $expectedData = [
            'name' => 'sign_up',
            'params' => [
                'method' => 'Google',
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }

    public function testWithoutData(): void
    {
        $event = new SignUpEvent();

        $expectedData = [
            'name' => 'sign_up',
            'params' => [],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
