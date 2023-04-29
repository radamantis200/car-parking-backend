<?php

namespace App\Services\Vehicle;

use App\Models\Vehicle;
use Illuminate\Http\Response;
use App\Http\Resources\Vehicle\VehicleResource;

class VehicleService
{
    public function index()
    {
        $vehicle = Vehicle::select('id', 'plate_number')->get();

        return VehicleResource::collection($vehicle);
    }

    public function create(array $request)
    {
        $vehicle = Vehicle::create($request);

        return VehicleResource::make($vehicle);
    }

    public function show(Vehicle $vehicle)
    {
        return VehicleResource::make($vehicle);
    }

    public function update(array $request, Vehicle $vehicle)
    {
        $vehicle->update($request);

        return response()->json(VehicleResource::make($vehicle), Response::HTTP_ACCEPTED);
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return response()->noContent();
    }
}
