<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\LoginEvent;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The PHPUnit test of the LoginEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\LoginEvent
 */
class LoginEventTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $event = new LoginEvent();
        $event->method = 'Google';

        $expectedData = [
            'name' => 'login',
            'params' => [
                'method' => 'Google',
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }

    public function testWithoutData(): void
    {
        $event = new LoginEvent();

        $expectedData = [
            'name' => 'login',
            'params' => [],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
