<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\BeginCheckoutEvent;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the BeginCheckoutEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\BeginCheckoutEvent
 */
class BeginCheckoutEventTest extends TestCase
{
    public function testWithData(): void
    {
        $item = new Item();
        $item->itemId = 'SKU_12345';

        $event = new BeginCheckoutEvent();
        $event->currency = 'USD';
        $event->value = 7.77;
        $event->coupon = 'SUMMER_FUN';
        $event->items = [$item];

        $expectedParams = [
            'currency' => 'USD',
            'value' => 7.77,
            'coupon' => 'SUMMER_FUN',
            'items' => [$item],
        ];

        $this->assertSame('begin_checkout', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new BeginCheckoutEvent();

        $this->assertSame('begin_checkout', $event->getName());
        $this->assertSame(['items' => []], $event->getParams());
    }
}
