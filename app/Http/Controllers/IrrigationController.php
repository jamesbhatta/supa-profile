<?php

namespace App\Http\Controllers;

use App\Irrigation;
use App\Province;
use Illuminate\Http\Request;

class IrrigationController extends Controller
{
    public function index(Irrigation $irrigation)
    {
        $irrigations=Irrigation::get();
        $provinces=Province::get();
        return view('agriculture.irrigation.index',compact(['irrigation','provinces','irrigations']));
    }
    public function store(Request $request)
    {
        Irrigation::create($request->validate([
            'district'=>"required",
            'area'=>"required",
            'arable_land'=>"required",
            'cultivated_land'=>"required",
            'yearly'=>"required",
            'half_yearly'=>"required",
        ]));
        return redirect()->back()->with('success',"added");
    }

    public function edit(Irrigation $irrigation)
    {
        $irrigations=Irrigation::get();
        $provinces=Province::get();
        return view('agriculture.irrigation.index',compact(['irrigation','provinces','irrigations']));
    }

    public function update(Request $request,Irrigation $irrigation)
    {
        $irrigation->update($request->validate([
            'district'=>"required",
            'area'=>"required",
            'arable_land'=>"required",
            'cultivated_land'=>"required",
            'yearly'=>"required",
            'half_yearly'=>"required",
        ]));
        return redirect()->route("irrigation.index")->with('success',"Updated");
    }
    public function destroy(Irrigation $irrigation)
    {
        $irrigation->delete();
        return redirect()->back()->with('success',"Deleted");
    }
}
