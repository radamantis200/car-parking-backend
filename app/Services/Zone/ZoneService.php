<?php

namespace App\Services\Zone;

use App\Models\Zone;
use App\Http\Resources\Zone\ZoneResource;

class ZoneService
{
    public function index()
    {
        $zone = Zone::select('id', 'name', 'price_per_hour')->get();

        return ZoneResource::collection($zone);
    }
}
