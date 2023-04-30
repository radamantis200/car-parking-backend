<?php

namespace App\Services\Parking;

use App\Models\Zone;
use Illuminate\Support\Carbon;

class ParkingPriceService
{
    public static function calculatePrice(string $zone_id, string $startTime, string $stopTime = null): int
    {
        $start = new Carbon($startTime);
        $stop = (! is_null($stopTime)) ? new Carbon($stopTime) : now();

        $totalTimeByMinutes = $stop->diffInMinutes($start);

        $priceByMinutes = Zone::find($zone_id)->price_per_hour / 60;

        return ceil($totalTimeByMinutes * $priceByMinutes);
    }
}
