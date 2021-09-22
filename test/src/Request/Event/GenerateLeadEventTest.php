<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\GenerateLeadEvent;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the GenerateLeadEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\GenerateLeadEvent
 */
class GenerateLeadEventTest extends TestCase
{
    public function testWithData(): void
    {
        $event = new GenerateLeadEvent();
        $event->currency = 'USD';
        $event->value = 7.77;

        $expectedParams = [
            'currency' => 'USD',
            'value' => 7.77,
        ];

        $this->assertSame('generate_lead', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new GenerateLeadEvent();

        $this->assertSame('generate_lead', $event->getName());
        $this->assertSame([], $event->getParams());
    }
}
