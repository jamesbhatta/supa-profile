<?php

namespace App\Http\Controllers;

use App\CastPopulation;
use App\Province;
use Illuminate\Http\Request;

class CastPopulationController extends Controller
{

    public function listing()
    {
        $data = CastPopulation::get();
        $dataset['labels'] = ["क्र.स.", "प्रदेश", "सङ्ख्या", "प्रतिशत"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $item->$item+1,
                $item->cast,
                $item->population+$item->female,
                $item->percentage,
               
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(CastPopulation $castPopulation)
    {
        $castPopulations=CastPopulation::get();
        $provinces=Province::get();
        return view('populations.cast_population.index',compact(['castPopulation','castPopulations','provinces']));
    }

    public function store(Request $request)
    {
        CastPopulation::create($request->validate([
            'cast'=>"required",
            'population'=>"required",
            'percentage'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(CastPopulation $castPopulation)
    {
        $castPopulations=CastPopulation::get();
        $provinces=Province::get();
        return view('populations.cast_population.index',compact(['castPopulation','castPopulations','provinces']));
    }

    public function update(Request $request, CastPopulation $castPopulation)
    {
        $castPopulation->update($request->validate([
            'cast'=>"required",
            'population'=>"required",
            'percentage'=>"required",
        ]));
        return redirect()->route("cast-population.index")->with("success","Updated");
    }

    public function destroy(CastPopulation $castPopulation)
    {
        $castPopulation->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
