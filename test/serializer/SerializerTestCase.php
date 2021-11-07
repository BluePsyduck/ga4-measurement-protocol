<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol;

use BluePsyduck\Ga4MeasurementProtocol\Serializer\Serializer;
use BluePsyduck\Ga4MeasurementProtocol\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;

/**
 * The serializer extension to test the serialization of objects.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class SerializerTestCase extends TestCase
{
    private SerializerInterface $serializer;

    protected function setUp(): void
    {
        $this->serializer = new Serializer();
    }

    /**
     * Asserts that the object serializes into the expected data structure.
     * @param array<mixed> $expectedData
     * @param object $object
     */
    protected function assertSerializedObject(array $expectedData, object $object): void
    {
        $serializedObject = $this->serializer->serialize($object);
        $data = json_decode($serializedObject, true);

        $this->assertEquals($expectedData, $data);
    }
}
