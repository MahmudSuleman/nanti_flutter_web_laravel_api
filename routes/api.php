<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ManufacturerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/test', function(){
    return response()->json('testing testing');
});

Route::apiResource('client', ClientController::class);
Route::apiResource('device', DeviceController::class);
Route::apiResource('manufacturer', ManufacturerController::class)->except(['show', 'create','edit']);