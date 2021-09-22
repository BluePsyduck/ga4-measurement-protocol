<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\AddPaymentInfoEvent;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the AddPaymentInfoEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\AddPaymentInfoEvent
 */
class AddPaymentInfoEventTest extends TestCase
{
    public function testWithData(): void
    {
        $item = new Item();
        $item->itemId = 'SKU_12345';

        $event = new AddPaymentInfoEvent();
        $event->currency = 'USD';
        $event->value = 7.77;
        $event->coupon = 'SUMMER_FUN';
        $event->paymentType = 'Credit Card';
        $event->items = [$item];

        $expectedParams = [
            'currency' => 'USD',
            'value' => 7.77,
            'coupon' => 'SUMMER_FUN',
            'payment_type' => 'Credit Card',
            'items' => [$item],
        ];

        $this->assertSame('add_payment_info', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new AddPaymentInfoEvent();

        $this->assertSame('add_payment_info', $event->getName());
        $this->assertSame(['items' => []], $event->getParams());
    }
}
