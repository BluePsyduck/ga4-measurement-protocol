<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\LoginEvent;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the LoginEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\LoginEvent
 */
class LoginEventTest extends TestCase
{
    public function testWithData(): void
    {
        $event = new LoginEvent();
        $event->method = 'Google';

        $expectedParams = [
            'method' => 'Google',
        ];

        $this->assertSame('login', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new LoginEvent();

        $this->assertSame('login', $event->getName());
        $this->assertSame([], $event->getParams());
    }
}
