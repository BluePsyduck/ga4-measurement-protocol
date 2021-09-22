<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

/**
 * Use this event when a user has shared content.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#share
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class ShareEvent implements EventInterface
{
    /**
     * The method in which the content is shared.
     * @var string|null
     */
    public ?string $method = null;

    /**
     * The type of shared content.
     * @var string|null
     */
    public ?string $contentType = null;

    /**
     * The ID of the shared content.
     * @var string|null
     */
    public ?string $itemId = null;

    public function getName(): string
    {
        return 'share';
    }

    public function getParams(): array
    {
        return array_filter([
            'method' => $this->method,
            'content_type' => $this->contentType,
            'item_id' => $this->itemId,
        ], fn($v) => !is_null($v));
    }
}
