<?php

namespace App\Http\Controllers;

use App\AgricultureProduce;
use App\Province;
use Illuminate\Http\Request;

class AgricultureProduceController extends Controller
{
    public function index(AgricultureProduce $agricultureProduce)
    {
        $provinces=Province::get();
        $agricultureProduces=AgricultureProduce::get();
        return view('agriculture.agriculture_produce.index',compact(['agricultureProduce','provinces','agricultureProduces']));
    }
    public function store(Request $request)
    {
        AgricultureProduce::create($request->validate([
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

    public function edit(AgricultureProduce $agricultureProduce)
    {
        $provinces=Province::get();
        $agricultureProduces=AgricultureProduce::get();
        return view('agriculture.agriculture_produce.index',compact(['agricultureProduce','provinces','agricultureProduces']));
    }

    public function update(Request $request,AgricultureProduce $agricultureProduce)
    {
        $agricultureProduce->update($request->validate([
            'district'=>"required",
            'food_area'=>"required",
            'vegetable_area'=>"required",
            'fruits_area'=>"required",
            'food_percentage'=>"required",
            'vegetable_percentage'=>"required",
            'fruits_percentage'=>"required",
        ]));
        return redirect()->route("agriculture-produce.index")->with('success',"Updated");
    }

    public function destroy(AgricultureProduce $agricultureProduce)
    {
        $agricultureProduce->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
