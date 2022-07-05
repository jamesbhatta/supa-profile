<?php

namespace App\Http\Controllers;

use App\DistrictWisePopulation;
use App\Province;
use Illuminate\Http\Request;

class DistrictWisePopulationController extends Controller
{
    public function listing()
    {
        $data = DistrictWisePopulation::get();
        $dataset['labels'] = ["क्षेत्र", "जम्मा", "पुरुष", "महिला", "प्रतिशत"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                
                $item->district,
                $item->male+$item->female,
                $item->male,
                $item->female,
                $item->percentage,
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(DistrictWisePopulation $districtWisePopulation)
    {
        $provinces=Province::get();
        $districtWisePopulations=DistrictWisePopulation::get();
        return view('populations.district_wise_population_2078.index',compact(['districtWisePopulation','districtWisePopulations','provinces']));
    }

    public function store(Request $request)
    {
        DistrictWisePopulation::create($request->validate([
            'district'=>"required",
            'male'=>"required|min:3|max:8",
            'female'=>"required|min:3|max:8",
            'percentage'=>"required|max:3",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(DistrictWisePopulation $districtWisePopulation)
    {
        $provinces=Province::get();
        $districtWisePopulations=DistrictWisePopulation::get();
        return view('populations.district_wise_population_2078.index',compact(['districtWisePopulation','districtWisePopulations','provinces']));
    }

    public function update(Request $request, DistrictWisePopulation $districtWisePopulation)
    {
        $districtWisePopulation->update($request->validate([
            'district'=>"required",
            'male'=>"required|min:3|max:8",
            'female'=>"required|min:3|max:8",
            'percentage'=>"required|max:3",
        ]));
        return redirect()->route("district-wise-population.index")->with('success',"Updated");
    }

    public function destroy(DistrictWisePopulation $districtWisePopulation)
    {
        $districtWisePopulation->delete();
        return redirect()->back()->with('success',"Remeved");
    }
}
