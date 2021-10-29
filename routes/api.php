<?php

use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/test', function(){
    return response()->json('testing testing');
});

Route::resource('client', ClientController::class)->except(['show', 'create']);