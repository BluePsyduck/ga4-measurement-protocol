<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Response;

/**
 * The response returned from the validation request.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class ValidateResponse
{
    /**
     * An array of validation messages.
     * @var array<ValidationMessage>
     */
    public array $validationMessages = [];
}
