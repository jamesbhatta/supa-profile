<?php

namespace App\Http\Controllers;

use App\MilkProduction;
use App\Province;
use Illuminate\Http\Request;

class MilkProductionController extends Controller
{
    public function index(MilkProduction $milkProduction)
    {
        $provinces=Province::get();
        $milkProductions=MilkProduction::get();
        return view('agriculture.milk_production.index',compact(['milkProduction','milkProductions','provinces']));
    }
    public function store(Request $request)
    {
        MilkProduction::create($request->validate([
            'district'=>"required",
            'cow'=>"required",
            'cow_milk'=>"required",
            'buffalo'=>"required",
            'buffalo_milk'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(MilkProduction $milkProduction)
    {
        $provinces=Province::get();
        $milkProductions=MilkProduction::get();
        return view('agriculture.milk_production.index',compact(['milkProduction','milkProductions','provinces']));
    }

    public function update(Request $request, MilkProduction $milkProduction)
    {
        $milkProduction->update($request->validate([
            'district'=>"required",
            'cow'=>"required",
            'cow_milk'=>"required",
            'buffalo'=>"required",
            'buffalo_milk'=>"required",
        ]));

        return redirect()->back()->with('success',"Updated");
    }

    public function destroy(MilkProduction $milkProduction)
    {
        $milkProduction->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
