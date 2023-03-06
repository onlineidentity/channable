<?php

namespace OnlineIdentity\Channable\Api;

use OnlineIdentity\Channable\Enums\ChannelType;

class Transporters extends Base
{

    private string $subject = 'transporters';

    public function allTransporters()
    {
        return $this->getBase($this->subject . '/all');
    }

    public function channelsForTransporter(string $transporter)
    {
        return $this->getBase($this->subject . '/transporter/' . $transporter);
    }

    public function transportersForChannel(ChannelType $channel)
    {
        return $this->getBase($this->subject . '/channel/' . $channel->value);
    }

}