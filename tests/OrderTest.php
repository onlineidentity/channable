<?php
beforeEach(function () {
    $this->channable = createClient();
});

it('gets an order class', function () {
    expect($this->channable->orders() instanceof \OnlineIdentity\Channable\Api\Order)->toBeTrue();
})->group('order');

it('can get all orders', function () {
    $client = mockClient(new \GuzzleHttp\Psr7\Response(
        200,
        [],
        json_encode(['total' => 1, 'error_count' => 0])
    ));

    $order = new \OnlineIdentity\Channable\Api\Order(createConfig(), $client);
    $response = $order->allOrders();

    expect($response)->toBeArray();
    expect($response['total'])->toBe(1);

})->group('order')->depends('it gets an order class');

it('can update a shipment', function () {
    $client = mockClient(new \GuzzleHttp\Psr7\Response(
        200,
        [],
        json_encode(['status' => 'success', 'message' => 'Shipment succesfully updated'])
    ));

    $order = new \OnlineIdentity\Channable\Api\Order(createConfig(), $client);
    $response = $order->shipment(1234, [
        "tracking_code" => "3S1234567890",
        "transporter" => "POSTNL",
        "order_item_ids" => [1, 2]
    ]);

    expect($response)->toBeArray();
    expect($response['status'])->toBe('success');
});


it('throws a channable exception', function () {
    $client = mockClient(new \GuzzleHttp\Exception\RequestException('Order 12345 not found', new \GuzzleHttp\Psr7\Request('GET', 'test')));

    $order = new \OnlineIdentity\Channable\Api\Order(createConfig(), $client);
    $response = $order->singleOrder(12345);

})->throws(\OnlineIdentity\Channable\Exceptions\ChannableException::class)->group('order')->depends('it gets an order class');

it('throws a channable exception bad request', function () {
    $client = mockClient(new \GuzzleHttp\Psr7\Response(400, [], json_encode(['status' => 'error', 'message' => '400 bad request'])));

    $order = new \OnlineIdentity\Channable\Api\Order(createConfig(), $client);
    $response = $order->singleOrder(12345);

})->throws(\OnlineIdentity\Channable\Exceptions\ChannableException::class)->group('order')->depends('it gets an order class');

it('throws a channable exception when not found', function () {
    $client = mockClient(new \GuzzleHttp\Psr7\Response(404, [], json_encode(['status' => 'error', 'message' => '404 not found'])));

    $order = new \OnlineIdentity\Channable\Api\Order(createConfig(), $client);
    $response = $order->singleOrder(12345);

})->throws(\OnlineIdentity\Channable\Exceptions\ChannableException::class)->group('order')->depends('it gets an order class');


it('throws a channable exception when request conflicts', function () {
    $client = mockClient(new \GuzzleHttp\Psr7\Response(409, [], json_encode(['status' => 'error', 'message' => '409 conflict'])));

    $order = new \OnlineIdentity\Channable\Api\Order(createConfig(), $client);
    $response = $order->cancellation(12345);

})->throws(\OnlineIdentity\Channable\Exceptions\ChannableException::class)->group('order')->depends('it gets an order class');


it('throws a channable exception when not valid', function () {
    $client = mockClient(new \GuzzleHttp\Psr7\Response(422, [], json_encode(['status' => 'error', 'message' => '422 not valid'])));

    $order = new \OnlineIdentity\Channable\Api\Order(createConfig(), $client);
    $response = $order->singleOrder(12345);

})->throws(\OnlineIdentity\Channable\Exceptions\ChannableException::class)->group('order')->depends('it gets an order class');




