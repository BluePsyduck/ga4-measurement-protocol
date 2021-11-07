<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\SelectPromotionEvent;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The PHPUnit test of the SelectPromotionEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\SelectPromotionEvent
 */
class SelectPromotionEventTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $item = new Item();
        $item->itemId = 'SKU_12345';

        $event = new SelectPromotionEvent();
        $event->creativeName = 'summer_banner2';
        $event->creativeSlot = 'featured_app_1';
        $event->locationId = 'L_12345';
        $event->promotionId = 'P_12345';
        $event->promotionName = 'Summer Sale';
        $event->items = [$item];

        $expectedData = [
            'name' => 'select_promotion',
            'params' => [
                'creative_name' => 'summer_banner2',
                'creative_slot' => 'featured_app_1',
                'location_id' => 'L_12345',
                'promotion_id' => 'P_12345',
                'promotion_name' => 'Summer Sale',
                'items' => [
                    [
                        'item_id' => 'SKU_12345',
                    ],
                ],
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }

    public function testWithoutData(): void
    {
        $event = new SelectPromotionEvent();

        $expectedData = [
            'name' => 'select_promotion',
            'params' => [
                'items' => [],
            ],
        ];

        $this->assertSerializedObject($expectedData, $event);
    }
}
