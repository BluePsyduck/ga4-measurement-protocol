<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\SignUpEvent;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the SignUpEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\SignUpEvent
 */
class SignUpEventTest extends TestCase
{
    public function testWithData(): void
    {
        $event = new SignUpEvent();
        $event->method = 'Google';

        $expectedParams = [
            'method' => 'Google',
        ];

        $this->assertSame('sign_up', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new SignUpEvent();

        $this->assertSame('sign_up', $event->getName());
        $this->assertSame([], $event->getParams());
    }
}
