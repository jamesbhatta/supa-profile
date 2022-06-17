<?php

namespace App\Http\Controllers;

use App\revenue;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function listingRevenue()
    {
        $data = revenue::get();
        $dataset['labels'] = ["क्र.स.", "शिर्षक", "रकम"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->title,
                $item->price
            ];
        }

        return response()->json($dataset, 200);
    }
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
        return redirect()->back()->with('success',"राजश्वको शिर्षकगत विवरण सफलतापूर्वक थपियो");
    }
    public function destroy(revenue $revenue)
    {
        $revenue->delete();
        return redirect()->back()->with('success',"राजश्वको शिर्षकगत विवरण सफलतापूर्वक हटाइयो");
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
        return redirect()->route('revenue.index')->with('success',"राजश्वको शिर्षकगत विवरण सफलतापूर्वक परिवर्तन भयो");
    }
}
