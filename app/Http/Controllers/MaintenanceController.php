<?php

namespace App\Http\Controllers;

use App\Models\Dispatch;
use App\Models\Maintenance;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Maintenance::all());
    }


    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'client_id' => ['required', 'numeric', 'exists:clients,id'],
            'device_id' => ['required', 'numeric', 'exists:devices,id'],
            'problem' => ['required', 'string']
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 404);
        }

        $maintenance = Maintenance::firstOrCreate($request->only(
            ['client_id', 'device_id']
        ), $request->only(
            ['client_id',
                'device_id',
                'problem']
        ));

//        device sent for maitenance need not to be part of dispatches again.
//        hence, delete it.
        Dispatch::where($request->only(
            ['client_id', 'device_id']
        ))->delete();

        return response()->json($maintenance, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
