<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Attribute;

use Attribute;

/**
 * The attribute of the events.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Event
{
    public function __construct(
        public string $name,
    ) {
    }
}
