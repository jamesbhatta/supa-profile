<?php

namespace App\Http\Controllers;

use App\Municipality;
use App\Province;
use App\Water;
use Illuminate\Http\Request;

class WaterController extends Controller
{

    public function listing()
    {
        $data = Water::with('district')->with('municipality')->get();
        $dataset['labels'] = ["क्रस", "जिल्ला", "न.पा./गा.वि.स.", "धारा", "ट्युबेल", "संरक्षित कुवा", "असंरक्षित कुवा", "थोपा पानी","नदीको धारा","अन्य"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->district->name,
                $item->municipality->name,
                $item->tap,
                $item->tubwell,
                $item->protected_well,
                $item->unprotected_well,
                $item->drop_water,
                $item->river_tap,
                $item->other,
               

            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(Water $water)
    {
        $waters = Water::with('district')->with('municipality')->get();
        $provinces = Province::get();
        $municipalities = Municipality::get();
        return view('infrastructureDevelopment.water.index', compact(['water', 'waters', 'provinces', 'municipalities']));
    }

    public function store(Request $request)
    {
        Water::create($request->validate([
            'district_id' => "required",
            'municipality_id' => "required",
            'tap' => "required",
            'tubwell' => "required",
            'protected_well' => "required",
            'unprotected_well' => "required",
            'drop_water' => "required",
            'river_tap' => "required",
            'other' => "required",
        ]));
        return redirect()->back()->with('success', "Saved");
    }

    public function edit(Water $water)
    {
        $waters = Water::with('district')->with('municipality')->get();
        $provinces = Province::get();
        $municipalities = Municipality::get();
        return view('infrastructureDevelopment.water.index', compact(['water', 'waters', 'provinces', 'municipalities']));
    }

    public function update(Request $request, Water $water)
    {
        $water->update($request->validate([
            'district_id' => "required",
            'municipality_id' => "required",
            'tap' => "required",
            'tubwell' => "required",
            'protected_well' => "required",
            'unprotected_well' => "required",
            'drop_water' => "required",
            'river_tap' => "required",
            'other' => "required",
        ]));
        return redirect()->route("water.index")->with('success', "Updated");
    }

    public function destroy(Water $water)
    {
        $water->delete();
        return redirect()->back()->with('success', "Removed");
    }
}
