<?php

namespace Channable\Api;

class Statistics extends Base
{

    private string $subject = 'statistics/orders';

    public function allStatistics(array $queryParameters = [])
    {
        return $this->get(subject: $this->subject . $this->convertQueryParameters($queryParameters));
    }

    public function singleOrdersConfigStatistics(int $order_config_id, array $queryParameters = [])
    {
        return $this->get(subject: $this->subject . $this->convertQueryParameters($queryParameters));
    }

}