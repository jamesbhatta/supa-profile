<?php

namespace App\Http\Controllers;

use App\FiscalYear;
use App\TotalBudget;
use Illuminate\Http\Request;

class TotalBudgetController extends Controller
{
    public function listingTotalBudget()
    {
        $data = TotalBudget::get();
        $dataset['labels'] = ["क्र.स.", "आर्थिक वर्ष", "चालु", "पुँजीगत", "जम्मा", "चालु", "प्रतिशत", "पुँजीगत", "प्रतिशत", "जम्मा", "प्रतिशत"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->fiscal_year,
                $item->running_budget,
                $item->capitalize_budget,
                $item->running_budget+$item->capitalize_budget,
                $item->running_expenses,
                $item->running_expenses_percentage,
                $item->capitalize_expenses,
                $item->capitalize_expenses_percentage,
                $item->running_expenses+$item->capitalize_expenses,
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(TotalBudget $totalBudget)
    {
        $totalBudgets = TotalBudget::all();
        $fiscalYear = FiscalYear::all();
        return view('economicCondition.TotalBudget.index', compact(['fiscalYear', 'totalBudgets', 'totalBudget']));
    }
    public function store(Request $request)
    {
        TotalBudget::create($request->validate([
            'fiscal_year' => "required",
            'running_budget' => "required",
            'capitalize_budget' => "required",
            'running_expenses' => "required",
            'running_expenses_percentage' => "required",
            'capitalize_expenses' => "required",
            'capitalize_expenses_percentage' => "required",
        ]));
        return redirect()->back()->with('success', "कूल बजेट र खर्चको अवस्था सफलतापूर्वक थपियो");
    }
    public function destroy(TotalBudget $totalBudget)
    {
        $totalBudget->delete();
        return redirect()->back()->with('success', "कूल बजेट र खर्चको अवस्था सफलतापूर्वक हटाइयो");
    }
    public function edit(TotalBudget $totalBudget)
    {
        $totalBudgets = TotalBudget::all();
        $fiscalYear = FiscalYear::all();
        return view('economicCondition.TotalBudget.index', compact(['fiscalYear', 'totalBudgets', 'totalBudget']));
    }
    public function update(Request $request, TotalBudget $totalBudget)
    {
        $totalBudget->update($request->validate([
            'fiscal_year' => "required",
            'running_budget' => "required",
            'capitalize_budget' => "required",
            'running_expenses' => "required",
            'running_expenses_percentage' => "required",
            'capitalize_expenses' => "required",
            'capitalize_expenses_percentage' => "required",
        ]));
        return redirect()->back()->with('success', "कूल बजेट र खर्चको अवस्था सफलतापूर्वक परिवर्तन भयो");
    }
}
