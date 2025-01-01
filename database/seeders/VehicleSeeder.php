<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        Vehicle::create([
            'license_plate' => 'ABC1234',
            'type' => 'car',
            'last_maintenance_date' => '2023-01-01',
            'mileage' => 10000,
            'maintenance_interval_mileage' => 30000,
            'maintenance_interval_time' => 180,
        ]);

        Vehicle::create([
            'license_plate' => 'XYZ5678',
            'type' => 'car',
            'last_maintenance_date' => '2023-06-15',
            'mileage' => 12000,
            'maintenance_interval_mileage' => 45000,
            'maintenance_interval_time' => 365,
        ]);

        Vehicle::create([
            'license_plate' => 'DEF4321',
            'type' => 'car',
            'last_maintenance_date' => '2022-12-12',
            'mileage' => 5000,
            'maintenance_interval_mileage' => 60000,
            'maintenance_interval_time' => 180,
        ]);
    }
}
