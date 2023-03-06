<?php

namespace OnlineIdentity\Channable\Api;

use OnlineIdentity\Channable\Enums\ReturnsType;

class Returns extends Base
{

    private string $subject = 'returns';

    public function allReturns(array $queryParameters = [])
    {
        return $this->get(subject: $this->subject . $this->convertQueryParameters($queryParameters));
    }

    public function anonymizedAllReturns(array $queryParameters = [])
    {
        return $this->get(subject: 'anonymous_returns' . $this->convertQueryParameters($queryParameters));
    }

    public function singleReturn($return_id)
    {
        return $this->get(subject: $this->subject . '/' . $return_id);
    }

    public function createTestReturn($order_id)
    {
        return $this->post(subject: $this->subject . '/test', parameters: ['order_id' => $order_id]);
    }

    /**
     * @param $return_id
     * @param string $status options: "accepted" "rejected" "repaired", "keeps", "exchanged", "cancelled"
     * @return mixed
     * @throws \Channable\Exceptions\ChannableException
     */
    public function updateReturnStatus($return_id, ReturnsType $status)
    {
        return $this->post(subject: $this->subject . '/' . $return_id . '/status', parameters: ['status' => $status->value]);
    }

}