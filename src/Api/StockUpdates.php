<?php

namespace OnlineIdentity\Channable\Api;

class StockUpdates extends Base
{

    private string $subject = 'stock_updates';

    public function getStockUpdates()
    {
        return $this->get(subject: 'offers');
    }

    public function stockUpdatesUpdate()
    {
        return $this->post(subject: $this->subject);
    }
}