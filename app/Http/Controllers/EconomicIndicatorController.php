<?php

namespace App\Http\Controllers;

use App\EconomicIndicator;
use Illuminate\Http\Request;

class EconomicIndicatorController extends Controller
{
    public function listingEconomicIndicator()
    {
        $data = EconomicIndicator::get();
        $dataset['labels'] = ["क्र.स.", "विवरण", "सूचक (प्रतिशत)"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->detail,
                $item->indicator,
            ];
        }

        return response()->json($dataset, 200);
    }
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
        return redirect()->back()->with('success',"प्रदेशको आर्थिक सूचकहरु सफलतापूर्वक थपियो");
    }

    public function destroy(EconomicIndicator $economicIndicator)
    {
        $economicIndicator->delete();
        return redirect()->back()->with('success',"प्रदेशको आर्थिक सूचकहरु सफलतापूर्वक हटाइयो");
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
    return redirect()->route('economic-indicator.index')->with('success',"प्रदेशको आर्थिक सूचकहरु सफलतापूर्वक परिवर्तन भयो");
    }
}
