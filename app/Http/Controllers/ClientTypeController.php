<?php

namespace App\Http\Controllers;

use App\Models\ClientType;
use Illuminate\Http\Request;

class ClientTypeController extends Controller
{
  
    public function index()
    {
        $types = ClientType::all();
        return response()->json($types, 200);
    }

   
    public function store(Request $request)
    {
        //
    }

 
    public function show($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}