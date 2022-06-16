<?php

namespace App\Http\Controllers;

use App\ElectricityAccess;
use App\Province;
use Illuminate\Http\Request;

class ElectricityAccessController extends Controller
{
    public function index(ElectricityAccess $electricityAccess)
    {
        $electricityAccesses=ElectricityAccess::all();
        $provinces=Province::all();
        return view('infrastructureDevelopment.electricityAccess.index',compact(['electricityAccesses','electricityAccess','provinces']));
    }
    public function store(Request $request)
    {
        ElectricityAccess::create($request->validate([
            'province'=>"required",
            'accessability'=>"required",
        ]));
        return redirect()->back()->with('success',"Added");
    }
    public function destroy(ElectricityAccess $electricityAccess)
    {
        $electricityAccess->delete();
        return redirect()->back()->with('success',"deleted");
    }
    public function edit(ElectricityAccess $electricityAccess)
    {
        $electricityAccesses=ElectricityAccess::all();
        $provinces=Province::all();
        return view('infrastructureDevelopment.electricityAccess.index',compact(['electricityAccesses','electricityAccess','provinces']));
    }
    public function update(Request $request, ElectricityAccess $electricityAccess)
    {
        $electricityAccess->update($request->validate([
            'province'=>"required",
            'accessability'=>"required",
        ]));
        return redirect()->route('electricity-access.index')->with('success',"updated");
    }
}
