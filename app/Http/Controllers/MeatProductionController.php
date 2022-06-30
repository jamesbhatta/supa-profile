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
        $dataset['labels'] = ["जिल्ला", "बफ", "मटन", "चेवन", "पोर्क", "चिकेन", "डक मिट", "जम्मा मासु"];
        // $dataset['backgroundColor'] = ["red", "green", "blue"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [

                $item->district,
                $item->buff,
                $item->mutton,
                $item->chewan,
                $item->pork,
                $item->chicken,
                $item->duck,
                $item->buff+$item->mutton+$item->chewan+$item->pork+$item->chicken+$item->duck
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
