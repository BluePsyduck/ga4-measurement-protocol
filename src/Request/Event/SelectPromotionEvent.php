<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

/**
 * This event signifies an promotion was selected from a list.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#select_promotion
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class SelectPromotionEvent implements EventInterface
{
    /**
     * The name of the promotional creative.
     * @var string|null
     */
    public ?string $creativeName = null;

    /**
     * The name of the promotional creative slot associated with the event.
     * @var string|null
     */
    public ?string $creativeSlot = null;

    /**
     * The ID of the location.
     * @var string|null
     */
    public ?string $locationId = null;

    /**
     * The ID of the promotion associated with the event.
     * @var string|null
     */
    public ?string $promotionId = null;

    /**
     * The name of the promotion associated with the event.
     * @var string|null
     */
    public ?string $promotionName = null;

    /**
     * The items for the event.
     * @var array<Item>
     */
    public array $items = [];

    public function getName(): string
    {
        return 'select_promotion';
    }

    public function getParams(): array
    {
        return array_filter([
            'creative_name' => $this->creativeName,
            'creative_slot' => $this->creativeSlot,
            'location_id' => $this->locationId,
            'promotion_id' => $this->promotionId,
            'promotion_name' => $this->promotionName,
            'items' => $this->items,
        ], fn($v) => !is_null($v));
    }
}
