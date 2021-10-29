<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $clients = Client::with('client_type')->get();
        return response()->json($clients, 200);
    }

    public function store(Request $request): JsonResponse
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'contact' => ['required'],
            'client_type_id' => ['required']
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(), 404);
        }
        $client = Client::create($request->all());
        return response()->json($client, 201);

    }

    public function update(Request $request, Client $client){
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'contact' => ['required'],
            'client_type_id' => ['required']
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(), 404);
        }

        Client::where('id', $client->id)->update(
            $request->all()
        );
        $client = Client::where('id', $client->id)->get();

        return response()->json($client, 200);
    }
}
