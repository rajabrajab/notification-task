<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\Vehicle;
use App\Events\VehicleMaintenanceEvent;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/create-admin', [AccountController::class, 'createAdmin'])->name('create.admin');

Route::get('/log/{userId}', [AccountController::class, 'directAdminLogin'])->name('admin.direct.login');


Route::resource('vehicles', VehicleController::class);


Route::get('/test-event', function () {
    $vehicle = Vehicle::first(); // Or any specific vehicle

    event(new VehicleMaintenanceEvent($vehicle));

    return 'Event triggered!';
});
