<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\EarnVirtualCurrencyEvent;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the EarnVirtualCurrencyEvent class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\EarnVirtualCurrencyEvent
 */
class EarnVirtualCurrencyEventTest extends TestCase
{
    public function testWithData(): void
    {
        $event = new EarnVirtualCurrencyEvent();
        $event->virtualCurrencyName = 'Gems';
        $event->value = 5;

        $expectedParams = [
            'virtual_currency_name' => 'Gems',
            'value' => 5.,
        ];

        $this->assertSame('earn_virtual_currency', $event->getName());
        $this->assertSame($expectedParams, $event->getParams());
    }

    public function testWithoutData(): void
    {
        $event = new EarnVirtualCurrencyEvent();

        $this->assertSame('earn_virtual_currency', $event->getName());
        $this->assertSame([], $event->getParams());
    }
}
