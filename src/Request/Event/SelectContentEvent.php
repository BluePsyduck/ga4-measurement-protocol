<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;

/**
 * This event signifies that a user has selected some content of a certain type. This event can help you identify
 * popular content and categories of content in your app.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#select_content
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
#[Event('select_content')]
class SelectContentEvent implements EventInterface
{
    /**
     * The type of selected content.
     * @var string|null
     */
    #[Parameter('content_type')]
    public ?string $contentType = null;

    /**
     * An identifier for the item that was selected.
     * @var string|null
     */
    #[Parameter('item_id')]
    public ?string $itemId = null;
}
