<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\ClientTypeController;
use App\Http\Controllers\DispatchNoteController;
use App\Http\Controllers\DispatchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->post('/test', function (Request $request) {
    return 'test';
});


Route::post('/login', function(Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'password' => 'required|string|min:6',
    ]);
   
    if($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }


   
    $user = User::where('name', $request->name)->first();
   

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }
    return response()->json([
        'token' => $user->createToken($request->name)->plainTextToken,
        'company'=>$user->company_id,
    ], 200);
    
})->name('login');

Route::apiResource('client', ClientController::class);
Route::apiResource('device', DeviceController::class);
Route::apiResource('manufacturer', ManufacturerController::class);
Route::apiResource('client-type', ClientTypeController::class);
Route::apiResource('dispatch-note', DispatchNoteController::class);
Route::apiResource('dispatch', DispatchController::class);

Route::post('dispatch/retrieve/{id}', [DispatchController::class, 'retrieve']);