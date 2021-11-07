<?php

namespace App\Http\Controllers;

use App\Models\DispatchNote;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DispatchNoteController extends Controller
{
    public function index()
    {
        $notes = DispatchNote::with('client')->get();
        return response()->json($notes, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'required',
            'note_date' => 'required',
            'note' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $note = DispatchNote::create($request->all());
        return response()->json($note, 201);
    }

    public function update(Request $request, $id)
    {
        $note = DispatchNote::find($id);
        if(is_null($note)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        $note->update($request->all());
        return response()->json($note, 200);
    }

    public function destroy(Request $request, $id)
    {
        $note = DispatchNote::find($id);
        if(is_null($note)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        $note->delete();
        return response()->json(null, 204);
    }
}