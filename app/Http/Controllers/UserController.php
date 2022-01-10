<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index(): JsonResponse
    {

        $user = User::with('client')->get();
        return response()->json($user);
    }


    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:users'],
            'email' => ['required', 'email', 'string'],
            'client_id' => ['required', 'exists:clients,id', 'numeric'],
            'password' => ['required']
        ]);


        if ($validator->fails()) {
            return response()->json($validator->messages(), 404);
        }

        $data = $request->all();
        $data['password'] = hash::make($data['password']);

        $user = User::create($data);
        return response()->json($user, 200);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:users,name,' . $id],
            'email' => ['required', 'email', 'string'],
            'client_id' => ['required', 'exists:clients,id', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 404);
        }

        $data = $request->all();


        $user = User::find($id);
        if (!$user)
            return response()->json('User not found', 404);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->client_id = $data['client_id'];
        if (isset($data['password'])) {
            if ($data['password'] != '')
                $user->password = Hash::make($data['password']);
        }
        $user->save();
        return response()->json(User::find($id), 200);
    }


    public function destroy($id)
    {
        //
    }
}
