<?php

namespace App\Http\Controllers;

use App\MainCrop;
use Illuminate\Http\Request;

class MainCropController extends Controller
{

    public function listing()
    {
        $data =MainCrop::get();
        $dataset['labels'] = ["बाली", "क्षेत्रफल हे.", "उत्पादन", "क्षेत्रफल हे.", "उत्पादन"];
        // $dataset['backgroundColor'] = ["red", "green", "blue"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                // $key=$key+1,
                $item->crops,
                $item->from_area,
                $item->from_production,
                $item->to_area,
                $item->to_production,
                
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(MainCrop $mainCrop)
    {
        $mainCrops=MainCrop::get();
        return view('agriculture.main_crop.index',compact(['mainCrop','mainCrops']));
    }

    public function edit(MainCrop $mainCrop)
    {
        $mainCrops=MainCrop::get();
        return view('agriculture.main_crop.index',compact(['mainCrop','mainCrops']));
    }

    public function store(Request $request)
    {
        MainCrop::create($request->validate([
            'crops'=>"required",
            'from_area'=>"required",
            'from_production'=>"required",
            'to_area'=>"required",
            'to_production'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function update(Request $request, MainCrop $mainCrop)
    {
        $mainCrop->update($request->validate([
            'crops'=>"required",
            'from_area'=>"required",
            'from_production'=>"required",
            'to_area'=>"required",
            'to_production'=>"required",
        ]));

        return redirect()->route("main-crop.index")->with('success',"Updated");
    }

    public function destroy(MainCrop $mainCrop)
    {
        $mainCrop->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
