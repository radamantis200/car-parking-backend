<?php

namespace App\Services\Vehicle;

use App\Models\Vehicle;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\Vehicle\VehicleResource;
use App\Http\Resources\Vehicle\VehicleCollection;

class VehicleService
{
    public function index(): VehicleCollection
    {
        $vehicle = Vehicle::select('id', 'plate_number')->get();

        return new VehicleCollection($vehicle);
    }

    public function create(array $request): VehicleResource
    {
        $vehicle = Vehicle::create($request);

        return VehicleResource::make($vehicle);
    }

    public function show(Vehicle $vehicle): VehicleResource
    {
        return VehicleResource::make($vehicle);
    }

    public function update(array $request, Vehicle $vehicle): JsonResponse
    {
        $vehicle->update($request);

        return response()->json(VehicleResource::make($vehicle), Response::HTTP_ACCEPTED);
    }

    public function destroy(Vehicle $vehicle): Response
    {
        $vehicle->delete();

        return response()->noContent();
    }
}
