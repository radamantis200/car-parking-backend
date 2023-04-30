<?php

namespace App\Http\Controllers\Api\V1\Parking;

use App\Models\Parking;
use App\Http\Controllers\Controller;
use App\Services\Parking\ParkingService;
use App\Http\Requests\Parking\StoreParkingRequest;

class ParkingController extends Controller
{
    public function __construct(private ParkingService $parking_service)
    {
    }

    public function start(StoreParkingRequest $request)
    {
        return $this->parking_service->start_parking($request->validated());
    }

    public function stop(Parking $parking)
    {
        return $this->parking_service->stop_parking($parking);
    }

    public function show(Parking $parking)
    {
        return $this->parking_service->show($parking);
    }
}
