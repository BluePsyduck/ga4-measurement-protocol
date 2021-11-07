<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Attribute;

use Attribute;

/**
 * The attribute marking an event parameter containing an array.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class ParameterArray
{
    public function __construct(
        public string $name,
    ) {
    }
}
