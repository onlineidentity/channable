<?php

namespace Channable\Api;

class Order extends Base
{

    private string $subject = 'orders';

    public function allOrders(array $queryParameters = [])
    {
        return $this->get(subject: $this->subject . $this->convertQueryParameters($queryParameters));
    }

    public function anonymizedAllOrders(array $queryParameters = [])
    {
        return $this->get(subject: 'anonymous_orders' . $this->convertQueryParameters(queryParameters: $queryParameters));
    }

    public function singleOrder(int $order_id)
    {
        return $this->get($this->subject . '/' . $order_id);
    }

    public function createTestOrder(int $orders_config_id, $parameters = [])
    {
        return $this->post(subject: $this->subject . '/' . $orders_config_id . '/test', parameters: $parameters);
    }

    public function shipment(int $order_id, $parameters = [])
    {
        return $this->post(subject: $this->subject . '/' . $order_id . '/shipment', parameters: $parameters);
    }

    public function cancellation(int $order_id, $parameters = [])
    {
        return $this->post(subject: $this->subject . '/' . $order_id . '/cancel', parameters: $parameters);
    }

    public function manual(int $order_id)
    {
        return $this->post(subject: $this->subject . '/' . $order_id . '/manual');
    }

}