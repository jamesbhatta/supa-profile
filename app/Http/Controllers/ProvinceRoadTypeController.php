<?php

namespace App\Http\Controllers;

use App\Province;
use App\ProvinceRoadType;
use Illuminate\Http\Request;

class ProvinceRoadTypeController extends Controller
{
    public function listingProvinceRoadType()
    {
        $data = ProvinceRoadType::get();
        $dataset['labels'] = ["प्रदेश", "धुले/कच्ची", "ग्राबेल", "कालोपत्रे", "जम्मा सडक", "प्रदेशको हिस्सा प्रतिशत", "सडक घनत्व"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->province,
                $item->normal_road,
                $item->garvel_road,
                $item->black_road,
                $item->total_road,
                $item->province_percentage,
                $item->road_density,
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(ProvinceRoadType $provinceRoadType)
    {
        $provinceRoadTypes = ProvinceRoadType::get();
        $provinces=Province::get();
        return view('infrastructureDevelopment.ProvinceRoadType.index',compact(['provinces','provinceRoadTypes','provinceRoadType']));
    }
    public function store(Request $request)
    {
        ProvinceRoadType::create($request->validate([
            'province'=>"required",
            'normal_road'=>"required",
            'garvel_road'=>"required",
            'black_road'=>"required",
            'total_road'=>"required",
            'province_percentage'=>"required",
            'road_density'=>"required",
        ]));
        return redirect()->back()->with('success',"सडकको प्रकार सफलतापूर्वक थपियो");
    }
    public function destroy(ProvinceRoadType $provinceRoadType)
    {
        $provinceRoadType->delete();
        return redirect()->back()->with('success',"सडकको प्रकार सफलतापूर्वक हटाइयो");
    }
    public function edit(ProvinceRoadType $provinceRoadType)
    {
        $provinceRoadTypes = ProvinceRoadType::get();
        $provinces=Province::get();
        return view('infrastructureDevelopment.ProvinceRoadType.index',compact(['provinces','provinceRoadTypes','provinceRoadType']));
    }
    public function update(Request $request,ProvinceRoadType $provinceRoadType)
    {
        $provinceRoadType->update($request->validate([
            'province'=>"required",
            'normal_road'=>"required",
            'garvel_road'=>"required",
            'black_road'=>"required",
            'total_road'=>"required",
            'province_percentage'=>"required",
            'road_density'=>"required",
        ]));
        return redirect()->route("province-road-type.index")->with('success',"सडकको प्रकार सफलतापूर्वक परिवर्तन भयो");
    }
}
