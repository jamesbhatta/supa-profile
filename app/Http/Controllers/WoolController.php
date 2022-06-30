<?php

namespace App\Http\Controllers;

use App\Province;
use App\Wool;
use Illuminate\Http\Request;

class WoolController extends Controller
{
    public function listingWool()
    {
        $data = Wool::get();
        $dataset['labels'] = ["जिल्ला", "भेडा", "उन उत्पादन किले"];
        // $dataset['backgroundColor'] = ["red", "green", "blue"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $item->district,
                $item->sheep,
                $item->wool,
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(Wool $wool)
    {
        $wools = Wool::get();
        $provinces = Province::get();
        return view('agriculture.wool.index', compact(['wool', 'wools', 'provinces']));
    }

    public function store(Request $request)
    {
        Wool::create($request->validate([
            'district' => "required",
            'sheep' => "required",
            'wool' => "required",
        ]));
        return redirect()->back()->with('success', "saved");
    }

    public function edit(Wool $wool)
    {
        $wools = Wool::get();
        $provinces = Province::get();
        return view('agriculture.wool.index', compact(['wool', 'wools', 'provinces']));
    }

    public function update(Request $request, Wool $wool)
    {
        $wool->update($request->validate([
            'district' => "required",
            'sheep' => "required",
            'wool' => "required",
        ]));

        return redirect()->route("wool-production.index")->with('success', "Updated");
    }

    public function destroy(Wool $wool)
    {
        $wool->delete();
        return redirect()->back()->with('success', "Removed");
    }
}
