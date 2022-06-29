<?php

namespace App\Http\Controllers;

use App\Province;
use App\RequireFood;
use Illuminate\Http\Request;

class RequireFoodController extends Controller
{

    public function listingRequireFood()
    {
        $data = RequireFood::get();
        $dataset['labels'] = ["जिल्ला", "मध्यावधि जनसंख्या", "चमल", "मकै", "कोदो", "फाँपर", "गहुँ", "जौ", "उपभोग्य खाद्यान्न", "आवश्यक खाद्यान्न", "वचत वा न्यून"];
        // $dataset['backgroundColor'] = ["red", "green", "blue"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                
                $item->district,
                $item->population,
                $item->rice,
                $item->maize,
                $item->kodo,
                $item->phppar,
                $item->wheat,
                $item->Barley,
                $item->production,
                $item->required_food,
                $item->saving,
            ];
        }

        return response()->json($dataset, 200);
    }

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
