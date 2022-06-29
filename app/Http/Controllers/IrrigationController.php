<?php

namespace App\Http\Controllers;

use App\Irrigation;
use App\Province;
use Illuminate\Http\Request;

class IrrigationController extends Controller
{

    public function listingIrrigation()
    {
        $data = Irrigation::get();
        $dataset['labels'] = ["क्रस", "जिल्ला", "कूल क्षेत्रफल (हे.)", "खेतीयोग्य जमिन (हे.)", "खेती गरिएको जमिन (हे.)", "बर्षभरि", "आंशिक", "जम्मा"];
        // $dataset['backgroundColor'] = ["red", "green", "blue"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->district,
                $item->area,
                $item->arable_land,
                $item->cultivated_land,
                $item->yearly,
                $item->half_yearly,
                $item->yearly+$item->half_yearly,
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(Irrigation $irrigation)
    {
        $irrigations = Irrigation::get();
        $provinces = Province::get();
        return view('agriculture.irrigation.index', compact(['irrigation', 'provinces', 'irrigations']));
    }
    public function store(Request $request)
    {
        Irrigation::create($request->validate([
            'district' => "required",
            'area' => "required",
            'arable_land' => "required",
            'cultivated_land' => "required",
            'yearly' => "required",
            'half_yearly' => "required",
        ]));
        return redirect()->back()->with('success', "added");
    }

    public function edit(Irrigation $irrigation)
    {
        $irrigations = Irrigation::get();
        $provinces = Province::get();
        return view('agriculture.irrigation.index', compact(['irrigation', 'provinces', 'irrigations']));
    }

    public function update(Request $request, Irrigation $irrigation)
    {
        $irrigation->update($request->validate([
            'district' => "required",
            'area' => "required",
            'arable_land' => "required",
            'cultivated_land' => "required",
            'yearly' => "required",
            'half_yearly' => "required",
        ]));
        return redirect()->route("irrigation.index")->with('success', "Updated");
    }
    public function destroy(Irrigation $irrigation)
    {
        $irrigation->delete();
        return redirect()->back()->with('success', "Deleted");
    }
}
