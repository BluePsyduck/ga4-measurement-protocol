<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\PurchaseEvent;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the PurchaseEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\PurchaseEvent
 */
class PurchaseEventTest extends TestCase
{
    public function testWithData(): void
    {
        $item = new Item();
        $item->itemId = 'SKU_12345';

        $event = new PurchaseEvent();
        $event->currency = 'USD';
        $event->transactionId = 'T_12345';
        $event->value = 12.21;
        $event->affiliation = 'Google Store';
        $event->coupon = 'SUMMER_FUN';
        $event->shipping = 3.33;
        $event->tax = 1.11;
        $event->items = [$item];

        $expectedParams = [
            'currency' => 'USD',
            'transaction_id' => 'T_12345',
            'value' => 12.21,
            'affiliation' => 'Google Store',
            'coupon' => 'SUMMER_FUN',
            'shipping' => 3.33,
            'tax' => 1.11,
            'items' => [$item],
        ];

        $this->assertSame('purchase', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new PurchaseEvent();

        $this->assertSame('purchase', $event->getName());
        $this->assertSame(['items' => []], $event->getParams());
    }
}
