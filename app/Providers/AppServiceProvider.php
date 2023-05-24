<?php

namespace App\Providers;

use App\Models\Parking;
use App\Models\Vehicle;
use Illuminate\Support\ServiceProvider;
use App\Observers\Parking\ParkingObserver;
use App\Observers\Vehicle\VehicleObserver;
use Illuminate\Database\Eloquent\Model;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(! app()->isProduction());
        Vehicle::observe(VehicleObserver::class);
        Parking::observe(ParkingObserver::class);
    }
}
