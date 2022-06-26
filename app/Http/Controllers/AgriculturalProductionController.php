<?php

namespace App\Http\Controllers;

use App\AgriculturalProduction;
use App\Province;
use Illuminate\Http\Request;

class AgriculturalProductionController extends Controller
{
    public function index(AgriculturalProduction $agriculturalProduction)
    {
        $provinces=Province::get();
        $agriculturalProductions=AgriculturalProduction::get();
        return view('agriculture.agricultural_production.index',compact(['agriculturalProduction','agriculturalProductions','provinces']));
    }
    public function store(Request $request)
    {
        AgriculturalProduction::create($request->validate([
            'district'=>"required",
            'food_area'=>"required",
            'vegetable_area'=>"required",
            'fruits_area'=>"required",
            'food_percentage'=>"required",
            'vegetable_percentage'=>"required",
            'fruits_percentage'=>"required",
        ]));

        return redirect()->back()->with('success',"Saved");
    }

    public function edit(AgriculturalProduction $agriculturalProduction)
    {
        $provinces=Province::get();
        $agriculturalProductions=AgriculturalProduction::get();
        return view('agriculture.agricultural_production.index',compact(['agriculturalProduction','agriculturalProductions','provinces']));
    }

    public function update(Request $request,AgriculturalProduction $agriculturalProduction)
    {
        $agriculturalProduction->update($request->validate([
            'district'=>"required",
            'food_area'=>"required",
            'vegetable_area'=>"required",
            'fruits_area'=>"required",
            'food_percentage'=>"required",
            'vegetable_percentage'=>"required",
            'fruits_percentage'=>"required",
        ]));
        return redirect()->route("agricultural-production.index")->with('success',"Updated");
    }

    public function destroy(AgriculturalProduction $agriculturalProduction)
    {
        $agriculturalProduction->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
