<?php

namespace App\Http\Controllers;

use App\LandUses;
use Illuminate\Http\Request;

class LandUsesController extends Controller
{
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
            'npl_area'=>"nullable",
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
            'sector'=>"required",
            'npl_area'=>"nullable",
            'supa_area'=>"nullable",
        ]));
        return redirect()->route("land-uses.index")->with('success',"भू – उपयोगको अवस्था सफलतापूर्वक परिवर्तन भयो");
    }
}
