<?php

namespace App\Services\Zone;

use App\Models\Zone;
use App\Http\Resources\Zone\ZoneCollection;

class ZoneService
{
    public function index(): ZoneCollection
    {
        $zone = Zone::select('id', 'name', 'price_per_hour')->get();

        return new ZoneCollection($zone);
    }
}
