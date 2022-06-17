<?php

namespace App\Http\Controllers;

use App\Province;
use App\ProvinceRoad;
use Illuminate\Http\Request;

class ProvinceRoadController extends Controller
{
    public function index(ProvinceRoad $provinceRoad)
    {
        $provinceRoads=ProvinceRoad::get();
        $provinces=Province::get();
        return view('infrastructureDevelopment.provinceRoad.index',compact(['provinces','provinceRoad','provinceRoads']));
    }
    public function store(Request $request)
    {
        ProvinceRoad::create($request->validate([
            'road_detail'=>"required",
            'province'=>"required",
            'lenght'=>"required",
        ]));
        return redirect()->back()->with('success',"सफलतापूर्वक थपियो");
    }
    public function destroy(ProvinceRoad $provinceRoad)
    {
        $provinceRoad->delete();
        return redirect()->back()->with('success',"सफलतापूर्वक हटाइयो");
    }
    public function edit(ProvinceRoad $provinceRoad)
    {
        $provinceRoads=ProvinceRoad::get();
        $provinces=Province::get();
        return view('infrastructureDevelopment.provinceRoad.index',compact(['provinces','provinceRoad','provinceRoads']));
    }
    public function update(Request $request, ProvinceRoad $provinceRoad)
    {
        $provinceRoad->update($request->validate([
            'road_detail'=>"required",
            'province'=>"required",
            'lenght'=>"required",
        ]));
        return redirect()->route("province-road.index")->with('success',"सफलतापूर्वक परिवर्तन भयो");
    }
}
