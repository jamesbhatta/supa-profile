<?php

namespace App\Http\Controllers;

use App\Province;
use App\RoadDetail;
use Illuminate\Http\Request;

class RoadDetailController extends Controller
{
    public function listing()
    {
        $data = RoadDetail::get();
        $dataset['labels'] = ["सडकको विवरण", "प्रदेश १", "मधेश", "बागमती", "गण्डकी", "लुम्बीनी", "कर्णाली", "सुदूरपश्चिम", "जम्मा"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                // $key + 1,
                $item->road_detail,
                $item->province_1,
                $item->province_2,
                $item->province_3,
                $item->province_4,
                $item->province_5,
                $item->province_6,
                $item->province_7,
                $item->province_1+$item->province_2+$item->province_3+$item->province_4+$item->province_5+$item->province_6+$item->province_7
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(RoadDetail $roadDetail)
    {
        $roadDetails=RoadDetail::get();
        $provinces=Province::get();
        return view('infrastructureDevelopment.road_detail.index',compact(['roadDetails','roadDetail','provinces']));
    }

    public function store(Request $request)
    {
        RoadDetail::create($request->validate([
            'road_detail'=>"required",
            'province_1'=>"required",
            'province_2'=>"required",
            'province_3'=>"required",
            'province_4'=>"required",
            'province_5'=>"required",
            'province_6'=>"required",
            'province_7'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(RoadDetail $roadDetail)
    {
        $roadDetails=RoadDetail::get();
        $provinces=Province::get();
        return view('infrastructureDevelopment.road_detail.index',compact(['roadDetails','roadDetail','provinces']));
    }

    public function update(Request $request, RoadDetail $roadDetail)
    {
        $roadDetail->update($request->validate([
            'road_detail'=>"required",
            'province_1'=>"required",
            'province_2'=>"required",
            'province_3'=>"required",
            'province_4'=>"required",
            'province_5'=>"required",
            'province_6'=>"required",
            'province_7'=>"required",
        ]));
        return redirect()->route("road-detail.index")->with('success',"Updated");
    }

    public function destroy(RoadDetail $roadDetail)
    {
        $roadDetail->delete();
        return redirect()->back()->with('success',"Removed");
    }

}
