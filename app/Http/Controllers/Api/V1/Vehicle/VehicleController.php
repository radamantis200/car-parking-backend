<?php

namespace App\Http\Controllers\Api\V1\Vehicle;

use App\Models\Vehicle;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Vehicle\VehicleService;
use App\Http\Resources\Vehicle\VehicleResource;
use App\Http\Resources\Vehicle\VehicleCollection;
use App\Http\Requests\Vehicle\StoreVehicleRequest;

class VehicleController extends Controller
{
    public function __construct(private readonly VehicleService $vehicle_service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): VehicleCollection
    {
        return $this->vehicle_service->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request): VehicleResource
    {
        return $this->vehicle_service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle): VehicleResource
    {
        return $this->vehicle_service->show($vehicle);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreVehicleRequest $request, Vehicle $vehicle): JsonResponse
    {
        return $this->vehicle_service->update($request->validated(), $vehicle);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle): Response
    {
        return $this->vehicle_service->destroy($vehicle);
    }
}
