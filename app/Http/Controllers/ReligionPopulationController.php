<?php

namespace App\Http\Controllers;

use App\Province;
use App\ReligionPopulation;
use Illuminate\Http\Request;

class ReligionPopulationController extends Controller
{

    public function listing()
    {
        $data = ReligionPopulation::get();
        $dataset['labels'] = ["जिल्ला", "जम्मा", "हिन्दु", "बौद्ध", "इश्लाम", "किराँत", "क्रिश्चियन", "प्रकृति", "अन्य"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [

                $item->district,
                $item->hindu+$item->baudha+$item->islam+$item->kirat+$item->christian+$item->prakirty+$item->other,
                $item->hindu,
                $item->baudha,
                $item->islam,
                $item->kirat,
                $item->christian,
                $item->prakirty,
                $item->other,
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(ReligionPopulation $religionPopulation)
    {
        $religionPopulations = ReligionPopulation::get();
        $provinces = Province::get();
        return view('populations.religion_population.index', compact(['religionPopulations', 'religionPopulation', 'provinces']));
    }

    public function store(Request $request)
    {
        ReligionPopulation::create($request->validate([
            'district' => "required",
            'hindu' => "required|min:2|max:7",
            'baudha' => "required|min:2|max:7",
            'islam' => "required|min:2|max:7",
            'kirat' => "required|min:2|max:7",
            'christian' => "required|min:2|max:7",
            'prakirty' => "required|min:2|max:7",
            'other' => "required|min:2|max:7",
        ]));
        return redirect()->back()->with('success', "Saved");
    }

    public function edit(ReligionPopulation $religionPopulation)
    {
        $religionPopulations = ReligionPopulation::get();
        $provinces = Province::get();
        return view('populations.religion_population.index', compact(['religionPopulations', 'religionPopulation', 'provinces']));
    }

    public function update(Request $request, ReligionPopulation $religionPopulation)
    {
        $religionPopulation->update($request->validate([
            'district' => "required",
            'hindu' => "required|min:2|max:7",
            'baudha' => "required|min:2|max:7",
            'islam' => "required|min:2|max:7",
            'kirat' => "required|min:2|max:7",
            'christian' => "required|min:2|max:7",
            'prakirty' => "required|min:2|max:7",
            'other' => "required|min:2|max:7",
        ]));
        return redirect()->route("religion-population.index")->with('success', "Updated");
    }

    public function destroy(ReligionPopulation $religionPopulation)
    {
        $religionPopulation->delete();
        return redirect()->back()->with('success', "Removed");
    }
}
