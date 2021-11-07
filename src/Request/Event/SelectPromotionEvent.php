<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\ParameterArray;

/**
 * This event signifies an promotion was selected from a list.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#select_promotion
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
#[Event('select_promotion')]
class SelectPromotionEvent implements EventInterface
{
    /**
     * The name of the promotional creative.
     * @var string|null
     */
    #[Parameter('creative_name')]
    public ?string $creativeName = null;

    /**
     * The name of the promotional creative slot associated with the event.
     * @var string|null
     */
    #[Parameter('creative_slot')]
    public ?string $creativeSlot = null;

    /**
     * The ID of the location.
     * @var string|null
     */
    #[Parameter('location_id')]
    public ?string $locationId = null;

    /**
     * The ID of the promotion associated with the event.
     * @var string|null
     */
    #[Parameter('promotion_id')]
    public ?string $promotionId = null;

    /**
     * The name of the promotion associated with the event.
     * @var string|null
     */
    #[Parameter('promotion_name')]
    public ?string $promotionName = null;

    /**
     * The items for the event.
     * @var array<Item>
     */
    #[ParameterArray('items')]
    public array $items = [];
}
