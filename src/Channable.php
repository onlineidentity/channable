<?php

namespace Channable;

use Channable\Api\Order;
use Channable\Api\Returns;
use Channable\Api\Statistics;
use Channable\Api\StockUpdates;
use Channable\Api\Transporters;

class Channable {



    public function __construct(private ChannableConfig $config)
    {
    }

    public function orders(): Order
    {
        return new Order($this->config);
    }

    public function stockUpdates(): StockUpdates
    {
        return new StockUpdates($this->config);
    }

    public function returns(): Returns
    {
        return new Returns($this->config);
    }

    public function transporters(): Transporters
    {
        return new Transporters($this->config);
    }

    public function statistics(): Statistics
    {
        return new Statistics($this->config);
    }
}

