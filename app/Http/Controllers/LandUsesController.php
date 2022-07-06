<?php

namespace App\Http\Controllers;

use App\LandUses;
use Illuminate\Http\Request;

class LandUsesController extends Controller
{
    public function listingLandUses()
    {
        $data = LandUses::get();
        $dataset['labels'] = ["क्र.स.", "क्षेत्र", "नेपालको क्षेत्रफल (हे.हजारमा)", "सुदूरपश्चिमको क्षेत्रफल (हे.हजारमा)"];
        $dataset['backgroundColor']=["red","green","blue"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->sector,
                $item->npl_area,
                $item->supa_area
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(LandUses $landUses)
    {
        # code...
        $landUsess=LandUses::get();
        return view('agriculture.landUses.index',compact(['landUses','landUsess']));
    }
    public function store(Request $request)
    {
        # code...
        LandUses::create($request->validate([
            'sector'=>"required",
            'npl_area'=>"required",
            'supa_area'=>"nullable",
        ]));
        return redirect()->back()->with('success',"भू – उपयोगको अवस्था सफलतापूर्वक थपियो");
    }

    public function destroy(LandUses $landUses)
    {
        # code...
        $landUses->delete();
        return redirect()->back()->with('success',"भू – उपयोगको अवस्था सफलतापूर्वक हटाइयो");
    }
    public function edit(LandUses $landUses)
    {
        # code...
        $landUsess=LandUses::get();
        return view('agriculture.landUses.index',compact(['landUses','landUsess']));
    }

    public function update(Request $request,LandUses $landUses)
    {
        # code...
        $landUses->update($request->validate([
            'sector'=>"required|min:3|max:50",
            'npl_area'=>"required|numeric|min:3|max:8",
            'supa_area'=>"nullable|numeric",
        ]));
        return redirect()->route("land-uses.index")->with('success',"भू – उपयोगको अवस्था सफलतापूर्वक परिवर्तन भयो");
    }
}
