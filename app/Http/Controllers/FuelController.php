<?php

namespace App\Http\Controllers;

use App\Fuel;
use App\Municipality;
use App\Province;
use Illuminate\Http\Request;

class FuelController extends Controller
{

    public function listing()
    {
        $data = Fuel::with('district')->with('municipality')->get();
        $dataset['labels'] = ["क्रस", "जिल्ला","न.पा./गा.वि.स.", "काठ दाउरा", "मट्टितेल", "एलपी ग्यास", "गुइँठा, गोबर", "बायोग्यास", "विधुत", "अन्य"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->district->name,
                $item->municipality->name,
                $item->wood,
                $item->Kerosene,
                $item->ALP_gas,
                $item->gobar,
                $item->bio_gas,
                $item->electricity,
                $item->other,
              
            ];
        }

        return response()->json($dataset, 200);
    }
    
    public function index(Fuel $fuel)
    {
        $fuels=Fuel::with('district')->with('municipality')->get();
        // return $fuels;
        $provinces=Province::get();
        $municipalities=Municipality::get();
        return view('infrastructureDevelopment.fuel.index',compact(['fuel','fuels','provinces','municipalities']));
    }

    public function store(Request $request)
    {
        Fuel::create($request->validate([
            'district_id'=>"required",
            'municipality_id'=>"required",
            'wood'=>"required",
            'Kerosene'=>"required",
            'ALP_gas'=>"required",
            'gobar'=>"required",
            'bio_gas'=>"required",
            'electricity'=>"required",
            'other'=>"required",
        ]));
        return redirect()->back()->with('success',"Added");
    }

    public function edit(Fuel $fuel)
    {
        $fuels=Fuel::with('district')->with('municipality')->get();
        // return $fuels;
        $provinces=Province::get();
        $municipalities=Municipality::get();
        return view('infrastructureDevelopment.fuel.index',compact(['fuel','fuels','provinces','municipalities']));
    }

    public function update(Request $request,Fuel $fuel)
    {
        $fuel->update($request->validate([
            'district_id'=>"required",
            'municipality_id'=>"required",
            'wood'=>"required",
            'Kerosene'=>"required",
            'ALP_gas'=>"required",
            'gobar'=>"required",
            'bio_gas'=>"required",
            'electricity'=>"required",
            'other'=>"required",
        ]));
        return redirect()->route("fuel.index")->with('success',"Updated");
    }

    public function destroy(Fuel $fuel)
    {
        $fuel->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
