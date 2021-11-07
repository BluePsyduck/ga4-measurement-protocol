# Google Analytics 4 Measurement Protocol Client

[![GitHub release (latest SemVer)](https://img.shields.io/github/v/release/BluePsyduck/ga4-measurement-protocol)](https://github.com/BluePsyduck/ga4-measurement-protocol/releases)
[![GitHub](https://img.shields.io/github/license/BluePsyduck/ga4-measurement-protocol)](LICENSE.md)
[![build](https://img.shields.io/github/workflow/status/BluePsyduck/ga4-measurement-protocol/CI?logo=github)](https://github.com/BluePsyduck/ga4-measurement-protocol/actions)
[![Codecov](https://img.shields.io/codecov/c/gh/BluePsyduck/ga4-measurement-protocol?logo=codecov)](https://codecov.io/gh/BluePsyduck/ga4-measurement-protocol)

This library contains a small client able to send events through the Measurement Protocol to Google Analytics 4.

Please always keep Google's warning about the current state of the API in mind when using this library:

> **Warning:** This is an alpha API and subject to change. You may encounter breaking changes while it is in alpha. Code 
> using this API should not be pushed to production. See limitations for issues that will be address before a general
> availability launch.

## Installation

Install this library through composer as any sane PHP developer would do:

```bash
composer require bluepsyduck/ga4-measurement-protocol
```

## Usage

This library uses [PSR-17](https://www.php-fig.org/psr/psr-17/) and [PSR-18](https://www.php-fig.org/psr/psr-18/) to
decouple its own logic from the actual client implementation. A compatible implementation must be provided to be able 
to use this library.

The following example shows how to use the `guzzlehttp/guzzle` package with the client class:

```php
<?php

use BluePsyduck\Ga4MeasurementProtocol\Config;
use BluePsyduck\Ga4MeasurementProtocol\Client;
use BluePsyduck\Ga4MeasurementProtocol\Serializer\Serializer;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\HttpFactory;
use Psr\Http\Client\ClientExceptionInterface;

// Create the required dependencies
$guzzleClient = new GuzzleClient();
$httpFactory = new HttpFactory();
$serializer = new Serializer();

// Create the additional config required by the client
$config = new Config();
$config->apiSecret = '1234567890abcdefghijkl';
$config->measurementId = 'G-1234567890';

// Create the actual client
$client = new Client(
    $guzzleClient, // Implementation of the PSR-18 ClientInterface 
    $httpFactory,  // Implementation of the PSR-17 RequestFactoryInterface
    $httpFactory,  // Implementation of the PSR-17 StreamFactoryInterface
    $serializer,   // Shipped with the library
    $config,
);

// Send a payload to GA4
try {
    $client->send($payload);
} catch (ClientExceptionInterface $e) {
    // Handle the exception, or ignore it
}
```

## Pre-defined events

The library ships with classes representing the events as specified in the 
[Google docs](https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events). 
These classes use public properties and type-hints to ensure basic data compatibility. The library does not contain any
additional data validation to keep it as small as possible. 

Here is an example of building an actual payload with pre-defined events:

```php
<?php
use BluePsyduck\Ga4MeasurementProtocol\Request\Payload;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\EarnVirtualCurrencyEvent;
use Psr\Http\Client\ClientExceptionInterface;

// Create the first simple event
$event1 = new EarnVirtualCurrencyEvent();
$event1->virtualCurrencyName = 'Gems';
$event1->value = 42;

// Create the second event, containing an item
$item = new Item();
$item->quantity = 4;
$item->itemId = 'I_12345';

$event2 = new AddPaymentInfoEvent();
$event2->value = 13.37;
$event2->currency = 'EUR';
$event2->items[] = $item;

// Create the actual payload
$payload = new Payload();
$payload->clientId = 'foo';
$payload->events = [$event1, $event2];

// Send the payload to GA4
try {
    $client->send($payload);
} catch (ClientExceptionInterface $e) {
    // Handle the exception, or ignore it
}
```

All attributes of the events are considered optional by the library, and initialised with `null`. Please refer to the 
reference docs to get additional information about which attributes may actually be required to be set.

## Custom events

To create your own events, simply implement the `EventInterface` and add the `Event` attribute to the class specifying
the name of the event, as well as the `Parameter` attribute to each property which should get send to Google Analytics.

```php
<?php

use BluePsyduck\Ga4MeasurementProtocol\Attribute\Event;
use BluePsyduck\Ga4MeasurementProtocol\Attribute\Parameter;
use BluePsyduck\Ga4MeasurementProtocol\Request\Event\EventInterface;

#[Event('fancy_event')] // Expects the name of the event to be used in the payload to Google Analytics. 
class FancyEvent implements EventInterface
{
    /**
     * A fancy value for the fancy event.
     * @var string|null 
     */
    #[Parameter('fancy_value')] // Expects the name of the parameter to be used in the payload. Please pay attention
                                // to the limitations of parameter names, such as their maximum length.
    public ?string $fancyValue = null;
}

// Create your custom event
$fancyEvent = new FancyEvent();
$fancyEvent->fancyValue = 'fancy';

// Add the event to the payload
$payload->events[] = $fancyEvent;
```

All parameters which should appear in the payload must be marked with the `Parameter` or `ParameterArray` attributes.
It is recommended to make the default value of all parameters `null`, as those will get filtered out and do not appear
in the payload.

## Further reading

* [Measurement Protocol (Google Analytics 4)](https://developers.google.com/analytics/devguides/collection/protocol/ga4)
* [Reference: Events](https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events)
