<?php

namespace App\Http\Controllers;

use App\AgriculturalProduction;
use App\Province;
use Illuminate\Http\Request;

class AgriculturalProductionController extends Controller
{

    public function listingAgriculturalProduction()
    {
        $data = AgriculturalProduction::get();
        $dataset['labels'] = ["जिल्ला", "खाद्य तथा अन्य बाली हे.", "तरकारी तथा बागवानी हे.", "फलफुल तथा मसला हे.", "खाद्य तथा अन्य बाली हे.", "तरकारी तथा बागवानी हे.", "फलफुल तथा मसला हे."];
        // $dataset['backgroundColor'] = ["red", "green", "blue"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                
                $item->district,
                $item->food_area,
                $item->vegetable_area,
                $item->fruits_area,
                $item->food_percentage,
                $item->vegetable_percentage,
                $item->fruits_percentage,
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(AgriculturalProduction $agriculturalProduction)
    {
        $provinces = Province::get();
        $agriculturalProductions = AgriculturalProduction::get();
        return view('agriculture.agricultural_production.index', compact(['agriculturalProduction', 'agriculturalProductions', 'provinces']));
    }
    public function store(Request $request)
    {
        AgriculturalProduction::create($request->validate([
            'district' => "required",
            'food_area' => "required",
            'vegetable_area' => "required",
            'fruits_area' => "required",
            'food_percentage' => "required",
            'vegetable_percentage' => "required",
            'fruits_percentage' => "required",
        ]));

        return redirect()->back()->with('success', "Saved");
    }

    public function edit(AgriculturalProduction $agriculturalProduction)
    {
        $provinces = Province::get();
        $agriculturalProductions = AgriculturalProduction::get();
        return view('agriculture.agricultural_production.index', compact(['agriculturalProduction', 'agriculturalProductions', 'provinces']));
    }

    public function update(Request $request, AgriculturalProduction $agriculturalProduction)
    {
        $agriculturalProduction->update($request->validate([
            'district' => "required",
            'food_area' => "required",
            'vegetable_area' => "required",
            'fruits_area' => "required",
            'food_percentage' => "required",
            'vegetable_percentage' => "required",
            'fruits_percentage' => "required",
        ]));
        return redirect()->route("agricultural-production.index")->with('success', "Updated");
    }

    public function destroy(AgriculturalProduction $agriculturalProduction)
    {
        $agriculturalProduction->delete();
        return redirect()->back()->with('success', "Removed");
    }
}
