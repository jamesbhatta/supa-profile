<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Municipality;
use App\Province;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    public function listingAirport()
    {
        $data = Airport::get();
        $dataset['labels'] = ["क्र.स.", "विमानस्थल", "जिल्ला", "पालिका", "स्थान", "अवस्था"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->airport,
                $item->district,
                $item->minicipality,
                $item->place,
                $item->status,
            ];
        }

        return response()->json($dataset, 200);
    }
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
