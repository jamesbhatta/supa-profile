<?php

namespace App\Http\Controllers;

use App\MeatProduction;
use App\Province;
use Illuminate\Http\Request;

class MeatProductionController extends Controller
{

    public function listingMeatProduction()
    {
        $data = MeatProduction::get();
        $dataset['labels'] = ["जिल्ला", "दुधालु गाइ सख्या", "गाइको दुध", "दुधालु भैसी सख्या", "भैसीको दुध", "जम्मा दुध उत्पादन"];
        // $dataset['backgroundColor'] = ["red", "green", "blue"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [

                $item->district,
                $item->cow,
                $item->cow_milk,
                $item->buffalo,
                $item->buffalo_milk,
                $item->buffalo_milk + $item->cow_milk,
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(MeatProduction $meatProduction)
    {
        $meatProductions = MeatProduction::get();
        $provinces = Province::get();
        return view('agriculture.meat_production.index', compact(['meatProduction', 'meatProductions', 'provinces']));
    }

    public function store(Request $request)
    {
        MeatProduction::create($request->validate([
            'district' => "required",
            'buff' => "required",
            'mutton' => "required",
            'chewan' => "required",
            'pork' => "required",
            'chicken' => "required",
            'duck' => "required",
        ]));
        return redirect()->back()->with('success', "Saved");
    }

    public function edit(MeatProduction $meatProduction)
    {
        $meatProductions = MeatProduction::get();
        $provinces = Province::get();
        return view('agriculture.meat_production.index', compact(['meatProduction', 'meatProductions', 'provinces']));
    }

    public function update(Request $request, MeatProduction $meatProduction)
    {
        $meatProduction->update($request->validate([
            'district' => "required",
            'buff' => "required",
            'mutton' => "required",
            'chewan' => "required",
            'pork' => "required",
            'chicken' => "required",
            'duck' => "required",
        ]));
        return redirect()->route("meat-production.index")->with('success', "Updated");
    }

    public function destroy(MeatProduction $meatProduction)
    {
        $meatProduction->delete();
        return redirect()->back()->with('success', "Deleted");
    }
}
