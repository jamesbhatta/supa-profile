<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Municipality;
use App\Province;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    public function index(Airport $airport)
    {
        $airports=Airport::all();
        $provinces=Province::all();
        $municipalities=Municipality::all();
        return view('infrastructureDevelopment.airport.index',compact(['airports','provinces','municipalities','airport']));
    }
    public function store(Request $request)
    {
        Airport::create($request->validate([
            'airport'=>"required",
            'district'=>"required",
            'minicipality'=>"required",
            'place'=>"required",
            'status'=>"required",
        ]));
        return redirect()->back()->with('success',"added");
    }
    public function destroy(Airport $airport)
    {
        $airport->delete();
        return redirect()->back()->with('success',"delete");
    }
    public function edit(Airport $airport)
    {
        $airports=Airport::all();
        $provinces=Province::all();
        $municipalities=Municipality::all();
        return view('infrastructureDevelopment.airport.index',compact(['airports','provinces','municipalities','airport']));   
    }

    public function update(Request $request, Airport $airport)
    {
        $airport->update($request->validate([
            'airport'=>"required",
            'district'=>"required",
            'minicipality'=>"required",
            'place'=>"required",
            'status'=>"required",
        ]));
        return redirect()->route('airport.index')->with('success',"Updated");
    }
}
