<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Response;

/**
 * The class holding a validation message.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class ValidationMessage
{
    /**
     * The path to the field that was invalid.
     * @var string
     */
    public string $fieldPath = '';

    /**
     * A description of the error.
     * @var string
     */
    public string $description = '';

    /**
     * A ValidationCode that corresponds to the error.
     * @var string
     */
    public string $validationCode = '';
}
