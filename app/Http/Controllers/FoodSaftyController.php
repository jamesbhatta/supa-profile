<?php

namespace App\Http\Controllers;

use App\FoodSafty;
use App\Province;
use Illuminate\Http\Request;

class FoodSaftyController extends Controller
{
    public function index(FoodSafty $foodSafty)
    {
        $foodSaftys=FoodSafty::get();
        $provinces=Province::get();
        return view('agriculture.food_safty.index',compact(['foodSafty','foodSaftys','provinces']));
    }

    public function store(Request $request)
    {
        FoodSafty::create($request->validate([
            'district'=>"required",
            'usable_food'=>"required",
            'required_food'=>"required",
            'safe_food'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(FoodSafty $foodSafty)
    {
        $foodSaftys=FoodSafty::get();
        $provinces=Province::get();
        return view('agriculture.food_safty.index',compact(['foodSafty','foodSaftys','provinces']));
    }

    public function update(Request $request, FoodSafty $foodSafty)
    {
        $foodSafty->update($request->validate([
            'district'=>"required",
            'usable_food'=>"required",
            'required_food'=>"required",
            'safe_food'=>"required",
        ]));
        return redirect()->route("food-safety.index")->with('success',"updated");
    }

    public function destroy(FoodSafty $foodSafty)
    {
        $foodSafty->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
