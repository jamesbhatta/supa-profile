<?php

namespace App\Http\Controllers;

use App\Province;
use App\RevenueSharing;
use Illuminate\Http\Request;

class RevenueSharingController extends Controller
{
    public function listingRevenueSharing()
    {
        $data = RevenueSharing::get();
        $dataset['labels'] = ["प्रदेश", "राजश्व बाँडफाँड", "प्रतिशत", "स्थानीय तह", "राजश्व बाँडफाँड", "प्रतिशत"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->province,
                $item->province_revenue,
                $item->province_revenue_percentage,
                $item->local_level,
                $item->local_level_revenue,
                $item->local_level_revenue_percentage
            ];
        }

        return response()->json($dataset, 200);
    }
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
        return redirect()->back()->with('success',"राजश्व बाँडफाँड सफलतापूर्वक थपियो");
    }
    public function destroy(RevenueSharing $revenueSharing)
    {
        $revenueSharing->delete();
        return redirect()->back()->with('success',"राजश्व बाँडफाँड सफलतापूर्वक हटाइयो");
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
        return redirect()->route('revenue-sharing.index')->with('success',"राजश्व बाँडफाँड सफलतापूर्वक परिवर्तन भयो");
    }
}
