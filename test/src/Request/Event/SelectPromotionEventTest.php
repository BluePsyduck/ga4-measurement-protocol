<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\SelectPromotionEvent;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the SelectPromotionEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\SelectPromotionEvent
 */
class SelectPromotionEventTest extends TestCase
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

        $expectedParams = [
            'creative_name' => 'summer_banner2',
            'creative_slot' => 'featured_app_1',
            'location_id' => 'L_12345',
            'promotion_id' => 'P_12345',
            'promotion_name' => 'Summer Sale',
            'items' => [$item],
        ];

        $this->assertSame('select_promotion', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new SelectPromotionEvent();

        $this->assertSame('select_promotion', $event->getName());
        $this->assertSame(['items' => []], $event->getParams());
    }
}
