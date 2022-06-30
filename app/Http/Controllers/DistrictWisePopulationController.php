<?php

namespace App\Http\Controllers;

use App\DistrictWisePopulation;
use App\Province;
use Illuminate\Http\Request;

class DistrictWisePopulationController extends Controller
{
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
            'male'=>"required",
            'female'=>"required",
            'percentage'=>"required",
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
            'male'=>"required",
            'female'=>"required",
            'percentage'=>"required",
        ]));
        return redirect()->route("district-wise-population.index")->with('success',"Updated");
    }

    public function destroy(DistrictWisePopulation $districtWisePopulation)
    {
        $districtWisePopulation->delete();
        return redirect()->back()->with('success',"Remeved");
    }
}
