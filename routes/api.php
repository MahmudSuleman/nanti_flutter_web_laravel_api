<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\ClientTypeController;
use App\Http\Controllers\DispatchNoteController;
use App\Http\Controllers\DispatchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('client', ClientController::class);
Route::apiResource('device', DeviceController::class);
Route::apiResource('manufacturer', ManufacturerController::class);
Route::apiResource('client-type', ClientTypeController::class);
Route::apiResource('dispatch-note', DispatchNoteController::class);
Route::apiResource('dispatch', DispatchController::class);