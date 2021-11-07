<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Serializer;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\ParameterArray;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\EventInterface;
use ReflectionAttribute;
use ReflectionClass;

/**
 * The class transforming the object structure into the data structure for GA.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class Serializer implements SerializerInterface
{
    /**
     * Serialized the provided object into the string for the GA request.
     * @param object $object
     * @return string
     */
    public function serialize(object $object): string
    {
        return (string) json_encode($this->transform($object));
    }

    /**
     * Transforms the value into its data representation.
     * @param mixed $value
     * @return mixed
     */
    private function transform(mixed $value): mixed
    {
        if ($value instanceof EventInterface) {
            return $this->transformEvent($value);
        }
        if (is_object($value)) {
            return $this->extractParameters($value);
        }
        if (is_array($value)) {
            return (object) array_map([$this, 'transform'], $value);
        }
        return $value;
    }

    /**
     * Transforms the event into its data representation.
     * @param EventInterface $event
     * @return object
     */
    private function transformEvent(EventInterface $event): object
    {
        $eventName = '';

        $reflectedClass = new ReflectionClass($event);
        $reflectedAttribute = $reflectedClass->getAttributes(Event::class)[0] ?? null;
        if ($reflectedAttribute instanceof ReflectionAttribute) {
            $eventName = $reflectedAttribute->newInstance()->name;
        }

        return (object) [
            'name' => $eventName,
            'params' => $this->extractParameters($event),
        ];
    }

    /**
     * Extracts the parameters from the object, using the attached attributes.
     * @param object $object
     * @return object
     */
    private function extractParameters(object $object): object
    {
        $parameters = [];

        $reflectedClass = new ReflectionClass($object);
        foreach ($reflectedClass->getProperties() as $reflectedProperty) {
            foreach ($reflectedProperty->getAttributes() as $reflectedAttribute) {
                $attribute = $reflectedAttribute->newInstance();
                if ($attribute instanceof Parameter) {
                    $parameters[$attribute->name] = $this->transform($reflectedProperty->getValue($object));
                } elseif ($attribute instanceof ParameterArray) {
                    $value = $reflectedProperty->getValue($object);
                    $parameters[$attribute->name] = array_map(
                        [$this, 'transform'],
                        is_array($value) ? $value : [],
                    );
                }
            }
        }

        return (object) array_filter($parameters, fn($v) => !is_null($v));
    }
}
