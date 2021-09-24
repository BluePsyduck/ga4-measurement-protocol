<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Exception;

use BluePsyduck\Ga4MeasurementProtocol\Exception\InvalidJsonResponseException;
use Exception;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the InvalidJsonResponseException class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Exception\InvalidJsonResponseException
 */
class InvalidJsonResponseExceptionTest extends TestCase
{
    public function test(): void
    {
        $message = 'foo';
        $previous = $this->createMock(Exception::class);
        $expectedMessage = 'Response was not valid JSON: foo';

        $exception = new InvalidJsonResponseException($message, $previous);

        $this->assertSame($expectedMessage, $exception->getMessage());
        $this->assertSame($previous, $exception->getPrevious());
    }
}
