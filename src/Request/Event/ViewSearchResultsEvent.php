<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\ParameterArray;

/**
 * Log this event when the users has been presented with the results of a search.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#view_search_results
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
#[Event('view_search_results')]
class ViewSearchResultsEvent implements EventInterface
{
    /**
     * The term that was searched for.
     * @var string|null
     */
    #[Parameter('search_term')]
    public ?string $searchTerm = null;

    /**
     * The items for the event.
     * @var array<Item>
     */
    #[ParameterArray('items')]
    public array $items = [];
}
