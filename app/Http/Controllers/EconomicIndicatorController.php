<?php

namespace App\Http\Controllers;

use App\EconomicIndicator;
use Illuminate\Http\Request;

class EconomicIndicatorController extends Controller
{
    public function index(EconomicIndicator $economicIndicator)
    {
        $economicindicators=EconomicIndicator::all();
        return view('economicCondition.economicIndicator.index',compact(['economicindicators','economicIndicator']));
    }
    public function store(Request $request)
    {
        EconomicIndicator::create($request->validate([
            'detail'=>"required",
            'indicator'=>"required"
        ]));
        return redirect()->back()->with('success',"Add");
    }

    public function destroy(EconomicIndicator $economicIndicator)
    {
        $economicIndicator->delete();
        return redirect()->back()->with('success',"deleted");
    }
    public function edit(EconomicIndicator $economicIndicator)
    {
        $economicindicators=EconomicIndicator::all();
        return view('economicCondition.economicIndicator.index',compact(['economicindicators','economicIndicator']));
    }
    public function update(Request $request,EconomicIndicator $economicIndicator)
    {
       $economicIndicator->update($request->validate([
        'detail'=>"required",
        'indicator'=>"required"
    ]));
    return redirect()->route('economic-indicator.index')->with('success',"updated");
    }
}
