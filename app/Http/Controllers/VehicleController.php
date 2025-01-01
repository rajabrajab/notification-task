<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();  // all vehicles
        return view('vehicles.index', compact('vehicles'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'mileage' => 'required|integer',
        ]);

        $vehicle->mileage = $request->mileage;
        $vehicle->save();

        return response()->json(['success' => true]);
    }
}
