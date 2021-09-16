<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller

{

    public function index () {
        $note = Note::all();
        return response()->json([
            'status' => 200,
            'note'=> $note,
        ]);
    }


    public function store(Request $request) {


        $note = new Note;
        $note->name = $request->input('name');
        $note->category = $request->input('category');
        //$note->date = $request->input('date');
        $note->desc = $request->input('desc');
        $note->save();

        return response() ->json([
            'status' => 200,
            'message' => 'Note Added Successfully',
        ]);
    }

    public function edit($id) {

        $note= Note::find($id);
        return response()->json([
            'status' => 200,
            'note' => $note,
        ]);

    }

    public function update(Request $request, $id) {
        
        $note = Note::find($id);
        $note->name = $request->input('name');
        $note->category = $request->input('category');
        $note->date = $request->input('date');
        $note->desc = $request->input('desc');
        $note->update();

        return response() ->json([
            'status' => 200,
            'message' => 'Note Updated Successfully',
        ]);
    }

    public function destroy ($id) {

        $note = Note::find($id);
        $note->delete();

         return response() ->json([
            'status' => 200,
            'message' => 'Note Deleted Successfully',
        ]);
    }
}
