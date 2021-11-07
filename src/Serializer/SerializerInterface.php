<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Serializer;

/**
 * The interface for transforming the object structure into the data structure for GA.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
interface SerializerInterface
{
    /**
     * Serialized the provided object into the string for the GA request.
     * @param object $object
     * @return string
     */
    public function serialize(object $object): string;
}
