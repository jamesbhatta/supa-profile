<?php

namespace App\Http\Controllers;

use App\LightSource;
use App\Municipality;
use App\Province;
use Illuminate\Http\Request;

class LightSourceController extends Controller
{

    public function listing()
    {
        $data = LightSource::with('district')->with('municipality')->get();
        $dataset['labels'] = ["क्रस", "जिल्ला","न.पा./गा.वि.स.", "विजुली", "मट्टितेल", "बायोग्यास", "सोलार", "अन्य"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->district->name,
                $item->municipality->name,
                $item->electricity,
                $item->kerosene,
                $item->bio_gas,
                $item->solar,
                $item->other,
               
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(LightSource $lightSource)
    {
        $lightSources=LightSource::with('district')->with('municipality')->get();
        $provinces=Province::get();
        $municipalities=Municipality::get();
        return view('infrastructureDevelopment.light_source.index',compact(['lightSource','lightSources','provinces','municipalities']));
    }

    public function store(Request $request)
    {
        LightSource::create($request->validate([
            'district_id'=>"required",
            'municipality_id'=>"required",
            'electricity'=>"required",
            'kerosene'=>"required",
            'bio_gas'=>"required",
            'solar'=>"required",
            'other'=>"required",
        ]));

        return redirect()->back()->with('success',"Saved");
    }

    public function edit(LightSource $lightSource)
    {
        $lightSources=LightSource::with('district')->with('municipality')->get();
        $provinces=Province::get();
        $municipalities=Municipality::get();
        return view('infrastructureDevelopment.light_source.index',compact(['lightSource','lightSources','provinces','municipalities']));
    }

    public function update(Request $request, LightSource $lightSource)
    {
        $lightSource->update($request->validate([
            'district_id'=>"required",
            'municipality_id'=>"required",
            'electricity'=>"required",
            'kerosene'=>"required",
            'bio_gas'=>"required",
            'solar'=>"required",
            'other'=>"required",
        ]));
        return redirect()->route("light-source.index")->with('success',"Updated");
    }

    public function destroy(LightSource $lightSource)
    {
        $lightSource->delete();
        return redirect()->back()->with('success',"Removed");
    }

}
