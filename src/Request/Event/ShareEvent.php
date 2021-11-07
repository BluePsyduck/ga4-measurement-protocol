<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;

/**
 * Use this event when a user has shared content.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#share
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
#[Event('share')]
class ShareEvent implements EventInterface
{
    /**
     * The method in which the content is shared.
     * @var string|null
     */
    #[Parameter('method')]
    public ?string $method = null;

    /**
     * The type of shared content.
     * @var string|null
     */
    #[Parameter('content_type')]
    public ?string $contentType = null;

    /**
     * The ID of the shared content.
     * @var string|null
     */
    #[Parameter('item_id')]
    public ?string $itemId = null;
}
