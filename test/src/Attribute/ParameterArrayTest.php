<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Attribute;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\ParameterArray;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the ParameterArray class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Attribute\ParameterArray
 */
class ParameterArrayTest extends TestCase
{
    public function test(): void
    {
        $name = 'abc';

        $instance = new ParameterArray($name);

        $this->assertSame($name, $instance->name);
    }
}
