<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

/**
 * This event signifies that a user has selected some content of a certain type. This event can help you identify
 * popular content and categories of content in your app.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#select_content
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class SelectContentEvent implements EventInterface
{
    /**
     * The type of selected content.
     * @var string|null
     */
    public ?string $contentType = null;

    /**
     * An identifier for the item that was selected.
     * @var string|null
     */
    public ?string $itemId = null;

    public function getName(): string
    {
        return 'select_content';
    }

    public function getParams(): array
    {
        return array_filter([
            'content_type' => $this->contentType,
            'item_id' => $this->itemId,
        ], fn($v) => !is_null($v));
    }
}
