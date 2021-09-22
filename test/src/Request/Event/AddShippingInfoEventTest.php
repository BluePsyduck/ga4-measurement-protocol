<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\AddShippingInfoEvent;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the AddShippingInfoEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\AddShippingInfoEvent
 */
class AddShippingInfoEventTest extends TestCase
{
    public function testWithData(): void
    {
        $item = new Item();
        $item->itemId = 'SKU_12345';

        $event = new AddShippingInfoEvent();
        $event->currency = 'USD';
        $event->value = 7.77;
        $event->coupon = 'SUMMER_FUN';
        $event->shippingTier = 'Ground';
        $event->items = [$item];

        $expectedParams = [
            'currency' => 'USD',
            'value' => 7.77,
            'coupon' => 'SUMMER_FUN',
            'shipping_tier' => 'Ground',
            'items' => [$item],
        ];

        $this->assertSame('add_shipping_info', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new AddShippingInfoEvent();

        $this->assertSame('add_shipping_info', $event->getName());
        $this->assertSame(['items' => []], $event->getParams());
    }
}
