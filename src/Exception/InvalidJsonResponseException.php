<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Exception;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;
use Throwable;

/**
 * The exception thrown when an invalid JSON response is encountered.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class InvalidJsonResponseException extends Exception implements ClientExceptionInterface
{
    private const MESSAGE = 'Response was not valid JSON: %s';

    public function __construct(string $message, ?Throwable $previous = null)
    {
        parent::__construct(sprintf(self::MESSAGE, $message), 0, $previous);
    }
}
