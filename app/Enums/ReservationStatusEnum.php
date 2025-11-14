<?php

namespace App\Enums;

enum ReservationStatusEnum: string
{
    case CONFIRMED = 'confirmed';
    case CANCELLED = 'cancelled';
}
