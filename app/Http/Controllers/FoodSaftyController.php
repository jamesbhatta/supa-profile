<?php

namespace App\Http\Controllers;

use App\FoodSafty;
use App\Province;
use Illuminate\Http\Request;

class FoodSaftyController extends Controller
{

    public function listingFoodSafty()
    {
        $data = FoodSafty::get();
        $dataset['labels'] = ["जिल्ला", "उपभोग्य खाद्यान्न", "आवश्यक खाद्यान्न", "वचत वा न्यून"];
        // $dataset['backgroundColor'] = ["red", "green", "blue"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                // $item->$item+1,
                $item->district,
                $item->usable_food,
                $item->required_food,
                $item->safe_food,
                
                
            ];
        }

        return response()->json($dataset, 200);
    }

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
