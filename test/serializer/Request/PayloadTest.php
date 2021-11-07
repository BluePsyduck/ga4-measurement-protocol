<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\ViewItemEvent;
use BluePsyduck\Ga4MeasurementProtocol\Request\Payload;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The PHPUnit test of the Payload class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Payload
 */
class PayloadTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $item = new Item();
        $item->itemId = 'SKU_12345';

        $event = new ViewItemEvent();
        $event->currency = 'USD';
        $event->value = 7.77;
        $event->items = [$item];

        $payload = new Payload();
        $payload->clientId = 'foo.bar';
        $payload->userId = 'hello.world';
        $payload->timestampMicros = 1234567890;
        $payload->userProperties = [
            'abc' => 'def',
        ];
        $payload->nonPersonalizedAds = true;
        $payload->events = [$event];

        $expectedData = [
            'client_id' => 'foo.bar',
            'user_id' => 'hello.world',
            'timestamp_micros' => 1234567890,
            'user_properties' => [
                'abc' => 'def',
            ],
            'non_personalized_ads' => true,
            'events' => [
                [
                    'name' => 'view_item',
                    'params' => [
                        'currency' => 'USD',
                        'value' => 7.77,
                        'items' => [
                            [
                                'item_id' => 'SKU_12345',
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $this->assertSerializedObject($expectedData, $payload);
    }
}
