<?php

namespace App\Http\Controllers;

use App\GeographicalAreaPopulation;
use Illuminate\Http\Request;

class GeographicalAreaPopulationController extends Controller
{
    public function index(GeographicalAreaPopulation $geographicalPopulation)
    {
        $geographicalpopulations=GeographicalAreaPopulation::all();
        return view('populations.geographical.index',compact(['geographicalpopulations','geographicalPopulation']));
    }
    public function store(Request $request)
    {
       GeographicalAreaPopulation::create( $request->validate([
        'sector'=>"required",
        'population'=>"required",
        'area'=>"required",
        'density'=>"required",
       ]));
       return redirect()->back()->with('success',"added");  
    }
    public function destroy(GeographicalAreaPopulation $geographicalPopulation)
    {
        $geographicalPopulation->delete();
        return redirect()->back()->with('success',"Deleted");
    }
    public function edit(GeographicalAreaPopulation $geographicalPopulation)
    {
        $geographicalpopulations=GeographicalAreaPopulation::all();
        return view('populations.geographical.index',compact(['geographicalpopulations','geographicalPopulation']));
    }
    public function update(Request $request,GeographicalAreaPopulation $geographicalPopulation)
    {
        $geographicalPopulation->update($request->validate([
            'sector'=>"required",
            'population'=>"required",
            'area'=>"required",
            'density'=>"required",
        ]));
        return redirect()->route('geographical-population.index')->with('success',"update");
    }
}
