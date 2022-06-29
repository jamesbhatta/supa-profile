<?php

namespace App\Http\Controllers;

use App\MilkProduction;
use App\Province;
use Illuminate\Http\Request;

class MilkProductionController extends Controller
{
    public function listingMilkProduction()
    {
        $data = MilkProduction::get();
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
                $item->buffalo_milk+$item->cow_milk,
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(MilkProduction $milkProduction)
    {
        $provinces = Province::get();
        $milkProductions = MilkProduction::get();
        return view('agriculture.milk_production.index', compact(['milkProduction', 'milkProductions', 'provinces']));
    }
    public function store(Request $request)
    {
        MilkProduction::create($request->validate([
            'district' => "required",
            'cow' => "required",
            'cow_milk' => "required",
            'buffalo' => "required",
            'buffalo_milk' => "required",
        ]));
        return redirect()->back()->with('success', "Saved");
    }

    public function edit(MilkProduction $milkProduction)
    {
        $provinces = Province::get();
        $milkProductions = MilkProduction::get();
        return view('agriculture.milk_production.index', compact(['milkProduction', 'milkProductions', 'provinces']));
    }

    public function update(Request $request, MilkProduction $milkProduction)
    {
        $milkProduction->update($request->validate([
            'district' => "required",
            'cow' => "required",
            'cow_milk' => "required",
            'buffalo' => "required",
            'buffalo_milk' => "required",
        ]));

        return redirect()->back()->with('success', "Updated");
    }

    public function destroy(MilkProduction $milkProduction)
    {
        $milkProduction->delete();
        return redirect()->back()->with('success', "Removed");
    }
}
