<?php

namespace App\Http\Controllers;

use App\revenue;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function index(revenue $revenue)
    {
        $revenues=revenue::all();
        return view('economicCondition.revenue.index',compact(['revenues','revenue']));
    }
    public function store(Request $request)
    {
        revenue::create($request->validate([
            'title'=>"required",
            'price'=>"required"
        ]));
        return redirect()->back()->with('success',"Added");
    }
    public function destroy(revenue $revenue)
    {
        $revenue->delete();
        return redirect()->back()->with('success',"Deleted");
    }

    public function edit(revenue $revenue)
    {
        $revenues=revenue::all();
        return view('economicCondition.revenue.index',compact(['revenues','revenue']));
    }

    public function update(Request $request,revenue $revenue)
    {
        $revenue->update($request->validate([
            'title'=>"required",
            'price'=>"required"
        ]));
        return redirect()->route('revenue.index')->with('success',"Updated");
    }
}
