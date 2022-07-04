<?php

namespace App\Http\Controllers;

use App\NationalPopulationCensus;
use App\Province;
use Illuminate\Http\Request;

class NationalPopulationCensusController extends Controller
{
    public function listing()
    {
        $data = NationalPopulationCensus::get();
        $dataset['labels'] = ["क्षेत्र", "कुल जनसंख्या(२०६८)", "जनगणना घरसंख्या", "घरपरिवार संख्या", "जम्मा", "पुरुष", "महिला", "लैंगिक अनुपात", "औषत परिवार आकार", "वार्षिक वृद्धिदर(%)", "जनघनत्व र(प्रतिवग कि.मि.)"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->district,
                $item->population,
                $item->dencity,
                $item->census_house_number,
                $item->house_number,
                $item->male,
                $item->female,
                $item->ratio,
                $item->avg_family_size,
                $item->increase_rate,
               
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(NationalPopulationCensus $nationalPopulationCensus)
    {
        $nationalPopulationCensuss=NationalPopulationCensus::get();
        $provinces=Province::get();
        return view('populations.national_population_census.index',compact(['nationalPopulationCensus','nationalPopulationCensuss','provinces']));
    }

    public function store(Request $request)
    {
        NationalPopulationCensus::create($request->validate([
            'district'=>"required",
            'population'=>"required|min:5|max:8",
            'dencity'=>"required|min:2|max:5",
            'census_house_number'=>"required|min:2|max:5",
            'house_number'=>"required|min:2|max:5",
            'male'=>"required|min:2|max:7",
            'female'=>"required|min:2|max:7",
            'ratio'=>"required",
            'avg_family_size'=>"required|max:2",
            'increase_rate'=>"required|max:3",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(NationalPopulationCensus $nationalPopulationCensus)
    {
        $nationalPopulationCensuss=NationalPopulationCensus::get();
        $provinces=Province::get();
        return view('populations.national_population_census.index',compact(['nationalPopulationCensus','nationalPopulationCensuss','provinces']));
    }

    public function update(Request $request, NationalPopulationCensus $nationalPopulationCensus)
    {
        $nationalPopulationCensus->update($request->validate([
            'district'=>"required",
            'population'=>"required",
            'dencity'=>"required",
            'census_house_number'=>"required",
            'house_number'=>"required",
            'male'=>"required",
            'female'=>"required",
            'ratio'=>"required",
            'avg_family_size'=>"required",
            'increase_rate'=>"required",
        ]));
        return redirect()->route("national-population-census.index")->with('success',"Updated");
    }

    public function destroy(NationalPopulationCensus $nationalPopulationCensus)
    {
        $nationalPopulationCensus->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
