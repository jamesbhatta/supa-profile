<?php

namespace App\Http\Controllers;

use App\Province;
use App\RevenueSharing;
use Illuminate\Http\Request;

class RevenueSharingController extends Controller
{
    public function index(RevenueSharing $revenueSharing)
    {
        $revenueSharings=RevenueSharing::all();
        $province=Province::all();
        return view('economicCondition.revenueSharing.index',compact(['province','revenueSharings','revenueSharing']));
    }
    public function store(Request $request)
    {
        RevenueSharing::create($request->validate([
            'province'=>"required",
            'province_revenue'=>"required",
            'province_revenue_percentage'=>"required",
            'local_level'=>"required",
            'local_level_revenue'=>"required",
            'local_level_revenue_percentage'=>"required",
        ]));
        return redirect()->back()->with('success',"Added");
    }
    public function destroy(RevenueSharing $revenueSharing)
    {
        $revenueSharing->delete();
        return redirect()->back()->with('success',"deleted");
    }
    public function edit(RevenueSharing $revenueSharing)
    {
        $revenueSharings=RevenueSharing::all();
        $province=Province::all();
        return view('economicCondition.revenueSharing.index',compact(['province','revenueSharings','revenueSharing']));
    }
    public function update(Request $request,RevenueSharing $revenueSharing)
    {
        $revenueSharing->update($request->validate([
            'province'=>"required",
            'province_revenue'=>"required",
            'province_revenue_percentage'=>"required",
            'local_level'=>"required",
            'local_level_revenue'=>"required",
            'local_level_revenue_percentage'=>"required",
        ]));
        return redirect()->route('revenue-sharing.index')->with('success',"Updated");
    }
}
