<?php

namespace App\Observers;

use App\Events\VehicleMaintenanceEvent;
use App\Models\Vehicle;

class VehicleObserver
{
    /**
     * Handle the Vehicle "created" event.
     */
    public function created(Vehicle $vehicle): void
    {
        //
    }

    /**
     * Handle the Vehicle "updated" event.
     */
    public function updated(Vehicle $vehicle): void
    {
        // Trigger event for vehicle maintenance if mileage is close to maintenance threshold
        if ($vehicle->mileage >= ($vehicle->maintenance_interval_mileage - 15000)) {
            event(new VehicleMaintenanceEvent($vehicle));  // Trigger the event
        }
    }

    /**
     * Handle the Vehicle "deleted" event.
     */
    public function deleted(Vehicle $vehicle): void
    {
        //
    }

    /**
     * Handle the Vehicle "restored" event.
     */
    public function restored(Vehicle $vehicle): void
    {
        //
    }

    /**
     * Handle the Vehicle "force deleted" event.
     */
    public function forceDeleted(Vehicle $vehicle): void
    {
        //
    }
}
