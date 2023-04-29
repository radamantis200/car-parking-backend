<?php

namespace App\Http\Controllers\Api\V1\Zone;

use App\Services\Zone\ZoneService;
use App\Http\Controllers\Controller;

class ZoneController extends Controller
{
    public function __construct(private ZoneService $zone_service)
    {
    }

    public function index()
    {
        return $this->zone_service->index();
    }
}
