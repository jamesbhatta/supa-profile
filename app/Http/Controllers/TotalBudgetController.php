<?php

namespace App\Http\Controllers;

use App\FiscalYear;
use App\TotalBudget;
use Illuminate\Http\Request;

class TotalBudgetController extends Controller
{
    public function index(TotalBudget $totalBudget)
    {
        $totalBudgets=TotalBudget::all();
        $fiscalYear=FiscalYear::all();
        return view('economicCondition.TotalBudget.index',compact(['fiscalYear','totalBudgets','totalBudget']));
    }
    public function store(Request $request)
    {
        TotalBudget::create($request->validate([
            'fiscal_year'=>"required",
            'running_budget'=>"required",
            'capitalize_budget'=>"required",
            'running_expenses'=>"required",
            'running_expenses_percentage'=>"required",
            'capitalize_expenses'=>"required",
            'capitalize_expenses_percentage'=>"required",
        ]));
        return redirect()->back()->with('success',"Added");
    }
    public function destroy(TotalBudget $totalBudget)
    {
        $totalBudget->delete();
        return redirect()->back()->with('success',"Deleted");
    }
    public function edit(TotalBudget $totalBudget)
    {
        $totalBudgets=TotalBudget::all();
        $fiscalYear=FiscalYear::all();
        return view('economicCondition.TotalBudget.index',compact(['fiscalYear','totalBudgets','totalBudget']));
    }
    public function update(Request $request, TotalBudget $totalBudget)
    {
        $totalBudget->update($request->validate([
            'fiscal_year'=>"required",
            'running_budget'=>"required",
            'capitalize_budget'=>"required",
            'running_expenses'=>"required",
            'running_expenses_percentage'=>"required",
            'capitalize_expenses'=>"required",
            'capitalize_expenses_percentage'=>"required", 
        ]));
        return redirect()->back()->with('success',"Updated");
    }
}
