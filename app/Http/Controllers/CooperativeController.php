<?php

namespace App\Http\Controllers;

use App\Cooperative;
use App\District;
use Illuminate\Http\Request;

class CooperativeController extends Controller
{
    public function index(Cooperative $cooperative)
    {
        $cooperatives=Cooperative::all();
        $districts=District::all();
        return view('economicCondition.cooperative.index',compact(['cooperatives','districts','cooperative']));
    }
    public function store(Request $request)
    {
        Cooperative::create($request->validate([
            'district'=>"required",
            'org'=>"required",
            'number'=>"required",
        ]));
        return redirect()->back()->with('success',"Added");
    }

    public function edit(Cooperative $cooperative)
    {
        $cooperatives=Cooperative::all();
        $districts=District::all();
        return view('economicCondition.cooperative.index',compact(['cooperatives','districts','cooperative']));
    }
    public function destroy(Cooperative $cooperative)
    {
        $cooperative->delete();
        return redirect()->back()->with('success',"Deleted");
    }
    public function update(Request $request, Cooperative $cooperative)
    {
        $cooperative->update($request->validate([
            'district'=>"required",
            'org'=>"required",
            'number'=>"required",
        ]));
        return redirect()->route('cooperative.index')->with('success',"Updated");
    }
}
