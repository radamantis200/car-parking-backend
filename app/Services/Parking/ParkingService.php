<?php

namespace App\Services\Parking;

use App\Models\Parking;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Parking\ParkingResource;

class ParkingService
{
    public function start_parking(array $request)
    {
        if (Parking::active()->where('vehicle_id', $request['vehicle_id'])->exists()) {
            return response()->json([
                'errors' => ['general' => ['Can\'t start parking twice using same vehicle. Please stop currently active parking.']],
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $parking = Parking::create($request);
        $parking->load('vehicle', 'zone');

        return ParkingResource::make($parking);
    }

    public function show(Parking $parking)
    {
        return ParkingResource::make($parking);
    }

    public function stop_parking(Parking $parking)
    {
        if ($parking->stop_time) {
            return response()->json(
                ['errors' => ['general' => ['Parking already stopped.']]],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $parking->update([
            'stop_time' => now(),
            'total_price' => ParkingPriceService::calculatePrice($parking->zone_id, $parking->start_time),
        ]);

        return ParkingResource::make($parking);
    }
}
