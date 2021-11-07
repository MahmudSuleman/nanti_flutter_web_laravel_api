<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Dispatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DispatchController extends Controller
{
    public function index()
    {
        $dispatches = Dispatch::with(['client.client_type', 'device.manufacturer'])->get();
        return response()->json($dispatches, 200);
    }

   
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => ['required', 'exists:clients,id'],
            'device_id' => ['required', 'exists:devices,id'],
            'date' => 'required',
            'note' => 'required']);
            
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $dispatch = Dispatch::create($request->all());
     
        Device::where('id', $request->device_id)->update(['is_available' =>0]);
     
        return response()->json($dispatch, 201);
        
    }

   

 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dispatch  $dispatch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dispatch $dispatch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dispatch  $dispatch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dispatch $dispatch)
    {
        //
    }
}