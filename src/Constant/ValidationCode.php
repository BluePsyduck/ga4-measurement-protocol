<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Constant;

/**
 * The interface holding the possible values for the validation code.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
interface ValidationCode
{
    /**
     * The value provided for a fieldPath was invalid.
     */
    public const VALUE_INVALID = 'VALUE_INVALID';

    /**
     * A required value for a fieldPath was not provided.
     */
    public const VALUE_REQUIRED = 'VALUE_REQUIRED';

    /**
     * The name provided was invalid.
     */
    public const NAME_INVALID = 'NAME_INVALID';

    /**
     * The name provided was one of the reserved names.
     */
    public const NAME_RESERVED = 'NAME_RESERVED';

    /**
     * The value provided was too large.
     */
    public const VALUE_OUT_OF_BOUNDS = 'VALUE_OUT_OF_BOUNDS';

    /**
     * There were too many parameters in the request.
     */
    public const EXCEEDED_MAX_ENTITIES = 'EXCEEDED_MAX_ENTITIES';

    /**
     * The same name was provided more than once in the request.
     */
    public const NAME_DUPLICATED = 'NAME_DUPLICATED';
}
