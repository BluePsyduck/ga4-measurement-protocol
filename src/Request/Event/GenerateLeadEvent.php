<?php

declare(strict_types=1);

namespace BluePsyduck\Ga4MeasurementProtocol\Request\Event;

/**
 * Log this event when a lead has been generated to understand the efficacy of your re-engagement campaigns.
 *
 * @see https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events#generate_lead
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
class GenerateLeadEvent implements EventInterface
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

    public function getName(): string
    {
        return 'generate_lead';
    }

    public function getParams(): array
    {
        return array_filter([
            'currency' => $this->currency,
            'value' => $this->value,
        ], fn($v) => !is_null($v));
    }
}
