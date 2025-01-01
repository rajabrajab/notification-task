<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{

    use HasFactory;

    protected $fillable = [
        'license_plate', 'type', 'last_maintenance_date', 'mileage',
        'maintenance_interval_mileage', 'maintenance_interval_time'
    ];
}
