<?php

namespace OnlineIdentity\Channable;

use OnlineIdentity\Channable\Api\Order;
use OnlineIdentity\Channable\Api\Returns;
use OnlineIdentity\Channable\Api\Statistics;
use OnlineIdentity\Channable\Api\StockUpdates;
use OnlineIdentity\Channable\Api\Transporters;

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

    public function setProjectId(int $project_id)
    {
        $this->config->setProjectId($project_id);
    }

    public function setConfig(ChannableConfig $config)
    {
        $this->config = $config;
    }
}

