<?php

namespace App\Http\Controllers;

use App\BudgetResourceStatus;
use Illuminate\Http\Request;

class BudgetResourceStatusController extends Controller
{
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
        return redirect()->back()->with('success','Added');
    }
    public function destroy(BudgetResourceStatus $budgetResource)
    {
        $budgetResource->delete();
        return redirect()->back()->with('success','Deleted');
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
        return redirect()->route('budget-resource.index')->with('success',"Updated");
    }
}
