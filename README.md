# Channable API connector

## Installation

`composer require onlineidentity/channable`

## Usage

To use the connector create a channable object in your project and add the required Channableconfig:

````php

$config = new \OnlineIdentity\Channable\ChannableConfig(
    api_token: '{API_TOKEN}',
    company_id: {COMPANY_ID},
    project_id: {PROJECT_ID}
);

$channable = new \Onlineidentity\Channable\Channable($config)


//Examples

//Get all orders
$channable->orders()->allOrders();

$order_id = 12345678;
$channable->orders()->shipment($order_id, [
    'tracking_code' => '3S1234567890',
    'transporter' => 'POSTNL',
    'order_item_ids' => [
        1,
        2
    ]
]);

//Get all returns with queryParameters
$channable->returns()->allReturns(['limit' => 2, 'last_modified_after' => '2022-01-01']);

//update returns status
$return_id = 12345678;
$status_accepted = \OnlineIdentity\Enums\ReturnsType::ACCEPTED;
$channable->returns()->updateReturnStatus($return_id, $status_accepted);
````
For more details and options visit the offical channable docs https://api.channable.com/v1/docs

## Supported versions

| Version | Php version |
|---------|-------------|
| 1.0     | 8.1^        |
