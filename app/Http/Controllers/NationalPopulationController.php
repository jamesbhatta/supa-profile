<?php

namespace App\Http\Controllers;

use App\NationalPopulation;
use Illuminate\Http\Request;

class NationalPopulationController extends Controller
{
    public function listingNationalPopulation()
    {
        $data = NationalPopulation::get();
        $dataset['labels'] = ["क्र.स.", "क्षेत्र", "2078", "2068"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->area,
                $item->new_population,
                $item->old_population
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(NationalPopulation $nationalPopulation)
    {
        $nationalPopulations=NationalPopulation::get();
        return view('populations.national_population.index',compact(['nationalPopulation','nationalPopulations']));
    }

    public function store(Request $request)
    {
        NationalPopulation::create($request->validate([
            'sector'=>"required",
            'new_population'=>"required",
            'old_population'=>"required",
        ]));

        return redirect()->back()->with('success',"Saved");
    }

    public function edit(NationalPopulation $nationalPopulation)
    {
        $nationalPopulations=NationalPopulation::get();
        return view('populations.national_population.index',compact(['nationalPopulation','nationalPopulations']));
    }

    public function update(Request $request, NationalPopulation $nationalPopulation)
    {
        $nationalPopulation->update($request->validate([
            'sector'=>"required",
            'new_population'=>"required",
            'old_population'=>"required",
        ]));
        return redirect()->route("national-population.index")->with('success',"Updated");
    }

    public function destroy(NationalPopulation $nationalPopulation)
    {
        $nationalPopulation->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
