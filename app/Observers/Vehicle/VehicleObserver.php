<?php

namespace App\Observers\Vehicle;

use App\Models\Vehicle;

class VehicleObserver
{
    public function creating(Vehicle $vehicle): void
    {
        if (auth()->check()) {
            $vehicle->user_id = auth()->id();
        }
    }
}
