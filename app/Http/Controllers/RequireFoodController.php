<?php

namespace App\Http\Controllers;

use App\Province;
use App\RequireFood;
use Illuminate\Http\Request;

class RequireFoodController extends Controller
{
    public function index(RequireFood $requireFood)
    {
        $provinces = Province::get();
        $requireFoods = RequireFood::get();
        
        return view('agriculture.required_food.index', compact(['requireFood', 'requireFoods', 'provinces']));
    }

    public function store(Request $request)
    {
        RequireFood::create($request->validate([
            'district' => "required",
            'population' => "required",
            'rice' => "required",
            'maize' => "required",
            'kodo' => "required",
            'phppar' => "required",
            'wheat' => "required",
            'Barley' => "required",
            'production' => "required",
            'required_food' => "required",
            'saving' => "required",
        ]));
        return redirect()->back()->with('success', "Saved");
    }

    public function edit(RequireFood $requireFood)
    {
        $provinces = Province::get();
        $requireFoods = RequireFood::get();
        return view('agriculture.required_food.index', compact(['requireFood', 'requireFoods', 'provinces']));
    }

    public function update(Request $request, RequireFood $requireFood)
    {
        $requireFood->update($request->validate([
            'district' => "required",
            'population' => "required",
            'rice' => "required",
            'maize' => "required",
            'kodo' => "required",
            'phppar' => "required",
            'wheat' => "required",
            'Barley' => "required",
            'production' => "required",
            'required_food' => "required",
            'saving' => "required",
        ]));
        return redirect()->route("required-food.index")->with('success', "Updated");
    }

    public function destroy(RequireFood $requireFood)
    {
        $requireFood->delete();
        return redirect()->back()->with('success', "Removed");
    }
}
