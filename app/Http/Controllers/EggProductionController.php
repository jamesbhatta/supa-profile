<?php

namespace App\Http\Controllers;

use App\EggProduction;
use App\Province;
use Illuminate\Http\Request;

class EggProductionController extends Controller
{
    public function index(EggProduction $eggProduction)
    {
        $eggProductions=EggProduction::get();
        $provinces=Province::get();
        return view('agriculture.egg_production.index',compact(['eggProduction','eggProductions','provinces']));
    }

    public function store(Request $request)
    {
        EggProduction::create($request->validate([
            'district'=>"required",
            'layers'=>"required",
            'duck'=>"required",
            'chicken_egg'=>"required",
            'duck_egg'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(EggProduction $eggProduction)
    {
        $eggProductions=EggProduction::get();
        $provinces=Province::get();
        return view('agriculture.egg_production.index',compact(['eggProduction','eggProductions','provinces']));
    }

    public function update(Request $request, EggProduction $eggProduction)
    {
        $eggProduction->update($request->validate([
            'district'=>"required",
            'layers'=>"required",
            'duck'=>"required",
            'chicken_egg'=>"required",
            'duck_egg'=>"required",
        ]));
        return redirect()->route("egg-production.index")->with('success',"Updated");
    }

    public function destroy(EggProduction $eggProduction)
    {
        $eggProduction->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
