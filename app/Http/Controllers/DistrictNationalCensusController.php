<?php

namespace App\Http\Controllers;

use App\DistrictNationalCensus;
use App\Province;
use Illuminate\Http\Request;

class DistrictNationalCensusController extends Controller
{
    public function index(DistrictNationalCensus $districtNationalCensus)
    {
        $districtNationalCensuses=DistrictNationalCensus::get();
        $provinces=Province::get();
        return view('populations.districtNationalCansus.index',compact(['districtNationalCensuses','districtNationalCensus','provinces']));
    }
    public function store(Request $request)
    {
        DistrictNationalCensus::create($request->validate([
            'secctor'=>"required",
            'population'=>"required",
            'house_number'=>"required",
            'family_number'=>"required",
            'male'=>"required",
            'female'=>"required",
            'ratio'=>"required",
            'family_size'=>"required",
            'increase_rate'=>"required",
            'density'=>"required",
        ]));
        return redirect()->back()->with('success',"Added");
    }
    public function edit(DistrictNationalCensus $districtNationalCensus)
    {
        $districtNationalCensuses=DistrictNationalCensus::get();
        $provinces=Province::get();
        return view('populations.districtNationalCansus.index',compact(['districtNationalCensuses','districtNationalCensus','provinces']));
    }

    public function destroy(DistrictNationalCensus $districtNationalCensus)
    {
        $districtNationalCensus->delete();
        return redirect()->back()->with('success',"Delete");
    }

    public function update(Request $request, DistrictNationalCensus $districtNationalCensus)
    {
        $districtNationalCensus->update($request->validate([
            'secctor'=>"required",
            'population'=>"required",
            'house_number'=>"required",
            'family_number'=>"required",
            'male'=>"required",
            'female'=>"required",
            'ratio'=>"required",
            'family_size'=>"required",
            'increase_rate'=>"required",
            'density'=>"required",
        ]));
        return redirect()->route("district-national-census.index")->with('success',"Updated");
    }
}
