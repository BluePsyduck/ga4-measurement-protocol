<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

/**
 * The interface representing an event to be sent in the payload.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
interface EventInterface
{
    /**
     * The name of the event.
     * @return string
     */
    public function getName(): string;

    /**
     * The parameters for the event.
     * @return array<string, mixed>
     */
    public function getParams(): array;
}
