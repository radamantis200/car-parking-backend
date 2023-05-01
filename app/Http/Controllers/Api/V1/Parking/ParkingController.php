<?php

namespace App\Http\Controllers\Api\V1\Parking;

use App\Models\Parking;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Parking\ParkingService;
use App\Http\Resources\Parking\ParkingResource;
use App\Http\Requests\Parking\StoreParkingRequest;

class ParkingController extends Controller
{
    public function __construct(private readonly ParkingService $parking_service)
    {
    }

    public function start(StoreParkingRequest $request): JsonResponse|ParkingResource
    {
        return $this->parking_service->start_parking($request->validated());
    }

    public function stop(Parking $parking): JsonResponse|ParkingResource
    {
        return $this->parking_service->stop_parking($parking);
    }

    public function show(Parking $parking): ParkingResource
    {
        return $this->parking_service->show($parking);
    }
}
