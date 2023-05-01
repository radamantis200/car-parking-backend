<?php

namespace App\Http\Controllers\Api\V1\Zone;

use App\Services\Zone\ZoneService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Zone\ZoneCollection;

class ZoneController extends Controller
{
    public function __construct(private readonly ZoneService $zone_service)
    {
    }

    public function index(): ZoneCollection
    {
        return $this->zone_service->index();
    }
}
