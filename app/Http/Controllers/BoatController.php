<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Boat;

class BoatController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        return view('boat.create');
    }

    public function store(Request $request)
    {
        $boat = new Boat;

        $boat->name = $request->input('boat_name');
        $boat->type = $request->input('boat_type');

        $boat->save();

        return redirect()->route('boat.show', ['id' => $boat->id]);
    }

    public function show(Request $request, $id)
    {
        $boat = NULL;

        try {
            $boat = Boat::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return view('boat.notfound')->with('id', $id);
        }

        return view('boat.show')->with('boat', $boat);
    }
}
