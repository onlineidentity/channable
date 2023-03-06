<?php

namespace OnlineIdentity\Channable\Enums;

enum ReturnsType: string
{
    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';
    case REPAIRED = 'repaired';
    case KEEPS = 'keeps';
    case EXCHANGED = 'exchanged';
    case CANCELLED = 'cancelled';
}