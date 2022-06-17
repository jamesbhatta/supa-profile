<?php

namespace App\Http\Controllers;

use App\BudgetResourceStatus;
use Illuminate\Http\Request;

class BudgetResourceStatusController extends Controller
{
    public function listingBudgetResource()
    {
        $data = BudgetResourceStatus::get();
        $dataset['labels'] = ["क्र.स.","आय तथा राजश्व", "रकम (रु.हजारमा)"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->income,
                $item->price
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(BudgetResourceStatus $budgetResource)
    {
        $budgetResources=BudgetResourceStatus::all();
        return view('economicCondition.budgetResource.index',compact(['budgetResource','budgetResources']));
    }
    public function store(Request $request)
    {
        BudgetResourceStatus::create($request->validate([
            'income'=>"required",
            'price'=>"required"
        ]));
        return redirect()->back()->with('success','बजेटको स्रोतको अवस्था सफलतापूर्वक थपियो');
    }
    public function destroy(BudgetResourceStatus $budgetResource)
    {
        $budgetResource->delete();
        return redirect()->back()->with('success','बजेटको स्रोतको अवस्था सफलतापूर्वक हटाइयो');
    }
    public function edit(BudgetResourceStatus $budgetResource)
    {
        $budgetResources=BudgetResourceStatus::all();
        return view('economicCondition.budgetResource.index',compact(['budgetResource','budgetResources']));
    }
    public function update(Request $request, BudgetResourceStatus $budgetResource)
    {
        $budgetResource->update($request->validate([
            'income'=>"required",
            'price'=>"required"
        ]));
        return redirect()->route('budget-resource.index')->with('success',"बजेटको स्रोतको अवस्था सफलतापूर्वक परिवर्तन भयो");
    }
}
