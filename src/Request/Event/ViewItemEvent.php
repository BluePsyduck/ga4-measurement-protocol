<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

/**
 * This event signifies that some content was shown to the user. Use this event to discover the most popular items
 * viewed.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#view_item
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class ViewItemEvent implements EventInterface
{
    /**
     * Currency of the items associated with the event, in 3-letter ISO 4217 format.
     * @var string|null
     */
    public ?string $currency = null;

    /**
     * The monetary value of the event.
     * @var float|null
     */
    public ?float $value = null;

    /**
     * The items for the event.
     * @var array<Item>
     */
    public array $items = [];

    public function getName(): string
    {
        return 'view_item';
    }

    public function getParams(): array
    {
        return array_filter([
            'currency' => $this->currency,
            'value' => $this->value,
            'items' => $this->items,
        ], fn($v) => !is_null($v));
    }
}
