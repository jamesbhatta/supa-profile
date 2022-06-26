<?php

namespace App\Http\Controllers;

use App\ConsumableFood;
use App\Province;
use Illuminate\Http\Request;

class ConsumableFoodController extends Controller
{
    public function index(ConsumableFood $consumableFood)
    {
        $provinces=Province::get();
        $consumableFoods=ConsumableFood::get();
        return view('agriculture.consumable_food.index',compact(['consumableFood','consumableFoods','provinces']));
    }

    public function store(Request $request)
    {
        ConsumableFood::create($request->validate([
            'province'=>"required",
            'population'=>"required",
            'rice'=>"required",
            'maize'=>"required",
            'kodo'=>"required",
            'phppar'=>"required",
            'wheat'=>"required",
            'Barley'=>"required",
            'production'=>"required",
            'required_food'=>"required",
            'saving'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(ConsumableFood $consumableFood)
    {
        $provinces=Province::get();
        $consumableFoods=ConsumableFood::get();
        return view('agriculture.consumable_food.index',compact(['consumableFood','consumableFoods','provinces']));
    }

    public function update(Request $request, ConsumableFood $consumableFood)
    {
        $consumableFood->update($request->validate([
            'province'=>"required",
            'population'=>"required",
            'rice'=>"required",
            'maize'=>"required",
            'kodo'=>"required",
            'phppar'=>"required",
            'wheat'=>"required",
            'Barley'=>"required",
            'production'=>"required",
            'required_food'=>"required",
            'saving'=>"required",
        ]));
        return redirect()->route("consumable-food.index")->with('success',"Updated");
    }

    public function destroy(ConsumableFood $consumableFood)
    {
        $consumableFood->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
