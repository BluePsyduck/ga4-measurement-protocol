<?php

declare(strict_types=1);

namespace BluePsyduckTest\Ga4MeasurementProtocol\Serializer;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\ParameterArray;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\EventInterface;
use BluePsyduck\Ga4MeasurementProtocol\Serializer\Serializer;
use PHPUnit\Framework\TestCase;

/**
 * The PHPUnit test of the Serializer class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Serializer\Serializer
 */
class SerializerTest extends TestCase
{
    /**
     * @return array<mixed>
     */
    public function provideSerialize(): array
    {
        $object1 = new class {
            #[Parameter('string1')]
            public ?string $string1 = 'abc';
            #[Parameter('string2')]
            public ?string $string2 = null;
            public ?string $string3 = 'def';

            #[Parameter('int1')]
            public ?int $int1 = 42;
            #[Parameter('int2')]
            public ?int $int2 = null;
            public ?int $int3 = 1337;

            /** @var array<mixed>  */
            #[Parameter('array1')]
            public ?array $array1 = ['ghi' => 'jkl'];
            /** @var array<mixed>  */
            #[Parameter('array2')]
            public ?array $array2 = null;
            /** @var array<mixed>  */
            public ?array $array3 = ['mno' => 'pqr'];
        };

        $expectedData1 = [
            'string1' => 'abc',
            'int1' => 42,
            'array1' => ['ghi' => 'jkl'],
        ];

        $object2 = new class {
            /** @var array<mixed> */
            #[ParameterArray('array1')]
            public array $array1 = ['abc' => 'def', 'ghi' => 42];

            /** @var array<mixed> */
            #[ParameterArray('array2')]
            public array $array2 = [];

            /** @var array<mixed> */
            public array $array3 = ['jkl' => 'mno'];
        };

        $expectedData2 = [
            'array1' => ['abc' => 'def', 'ghi' => 42],
            'array2' => [],
        ];

        // phpcs:ignore PSR12.Classes.ClassInstantiation.MissingParentheses -- https://github.com/squizlabs/PHP_CodeSniffer/issues/3456
        $object3 = new #[Event('test')] class implements EventInterface {
            #[Parameter('string')]
            public ?string $string = 'abc';
            #[Parameter('int')]
            public ?int $int = null;
        };

        $expectedData3 = [
            'name' => 'test',
            'params' => [
                'string' => 'abc',
            ],
        ];

        return [
            [$object1, $expectedData1],
            [$object2, $expectedData2],
            [$object3, $expectedData3],
        ];
    }

    /**
     * @param object $object
     * @param array<mixed> $expectedData
     * @dataProvider provideSerialize
     */
    public function testSerialize(object $object, array $expectedData): void
    {
        $instance = new Serializer();
        $result = $instance->serialize($object);

        $this->assertEquals($expectedData, json_decode($result, true));
    }
}
