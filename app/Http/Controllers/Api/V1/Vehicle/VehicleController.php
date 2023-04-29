<?php

namespace App\Http\Controllers\Api\V1\Vehicle;

use App\Models\Vehicle;
use App\Http\Controllers\Controller;
use App\Services\Vehicle\VehicleService;
use App\Http\Requests\Vehicle\StoreVehicleRequest;

class VehicleController extends Controller
{
    public function __construct(private VehicleService $vehicle_service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->vehicle_service->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request)
    {
        return $this->vehicle_service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return $this->vehicle_service->show($vehicle);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreVehicleRequest $request, Vehicle $vehicle)
    {
        return $this->vehicle_service->update($request->validated(), $vehicle);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        return $this->vehicle_service->destroy($vehicle);
    }
}
