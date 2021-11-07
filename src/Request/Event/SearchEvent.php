<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;

/**
 * Use this event to contextualize search operations. This event can help you identify the most popular content in your
 * app.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#search
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
#[Event('search')]
class SearchEvent implements EventInterface
{
    /**
     * The term that was searched for.
     * @var string|null
     */
    #[Parameter('search_term')]
    public ?string $searchTerm = null;
}
