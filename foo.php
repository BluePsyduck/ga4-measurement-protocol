<?php

require 'vendor/autoload.php';

$config = new \BluePsyduck\Ga4MeasurementProtocol\Config();
$config->apiSecret = '8paqNfOYSASIzkyQhsUxsg';
$config->measurementId = 'G-7NTX6PLT5S';

$hf = new \GuzzleHttp\Psr7\HttpFactory();

$client = new \BluePsyduck\Ga4MeasurementProtocol\Client(
    new \GuzzleHttp\Client(),
    $hf,
    $hf,
    $config,
);

$item1 = new \BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item();
$item1->quantity = 4;
$item1->itemId = 'FUK_YOU';

$event1 = new \BluePsyduck\Ga4MeasurementProtocol\Request\Event\AddPaymentInfoEvent();
$event1->value = 13.37;
$event1->currency = 'EUR';
$event1->items[] = $item1;

$event2 = new \BluePsyduck\Ga4MeasurementProtocol\Request\Event\EarnVirtualCurrencyEvent();
$event2->virtualCurrencyName = 'BTC';
$event2->value = 42;

$payload = new \BluePsyduck\Ga4MeasurementProtocol\Request\Payload();
$payload->events = [$event1, $event2];
//$payload->clientId = 'foo';

$response = $client->validate($payload);
var_dump($response);
