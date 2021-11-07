<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\GenerateLeadEvent;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The PHPUnit test of the GenerateLeadEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\GenerateLeadEvent
 */
class GenerateLeadEventTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $event = new GenerateLeadEvent();
        $event->currency = 'USD';
        $event->value = 7.77;

        $expectedData = [
            'name' => 'generate_lead',
            'params' => [
                'currency' => 'USD',
                'value' => 7.77,
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }

    public function testWithoutData(): void
    {
        $event = new GenerateLeadEvent();

        $expectedData = [
            'name' => 'generate_lead',
            'params' => [],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
