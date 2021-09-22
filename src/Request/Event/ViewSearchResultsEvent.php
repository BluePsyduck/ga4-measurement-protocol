<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

/**
 * Log this event when the users has been presented with the results of a search.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#view_search_results
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class ViewSearchResultsEvent implements EventInterface
{
    /**
     * The term that was searched for.
     * @var string|null
     */
    public ?string $searchTerm = null;

    /**
     * The items for the event.
     * @var array<Item>
     */
    public array $items = [];

    public function getName(): string
    {
        return 'view_search_results';
    }

    public function getParams(): array
    {
        return array_filter([
            'search_term' => $this->searchTerm,
            'items' => $this->items,
        ], fn($v) => !is_null($v));
    }
}
