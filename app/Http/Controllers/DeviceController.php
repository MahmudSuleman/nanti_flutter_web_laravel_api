<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{

    public function index()
    {
        $device = Device::with('manufacturer')->get();
        return response()->json($device, 200);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'manufacturer_id'=>['required'],
            'model'=>['required'],
            'serial_number' => ['required']
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(), 404);
        }

        $device = Device::create($request->all());

        return response()->json($device, 200);

    }


    public function update(Request $request, Device $device)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required'],
            'manufacturer_id'=>['required'],
            'model'=>['required'],
            'serial_number' => ['required']
        ]);
        if($validator->fails()){
            return response()->json($validator->messages(), 404);
        }
        if(!$device->update($request->all())){
            return response()->json('Failed to create device', 404);
        }
        return response()->json(Device::find($device->id), 200);
    }


    public function destroy(Device $device): JsonResponse
    {
      if($device->delete())
          return response()->json(['message' => 'Data deleted']);
      return response()->json(['message' => 'Failed to deleted data']);
    }


}