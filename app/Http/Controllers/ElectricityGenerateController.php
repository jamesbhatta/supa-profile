<?php

namespace App\Http\Controllers;

use App\ElectricityGenerate;
use App\FiscalYear;
use App\Province;
use Illuminate\Http\Request;

class ElectricityGenerateController extends Controller
{
    public function listingElectricityGenerate()
    {
        $data = ElectricityGenerate::get();
        $dataset['labels'] = ["प्रदेश", "०७७ सम्म (मे.वा.)"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                
                $item->province,
                $item->quantity,
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(ElectricityGenerate $electricityGenerate)
    {
        $electricityGenerates = ElectricityGenerate::get();
        $fiscalYears = FiscalYear::get();
        $provinces = Province::get();
        return view('infrastructureDevelopment.electricityGenerate.index', compact(['electricityGenerate', 'electricityGenerates', 'fiscalYears', 'provinces']));
    }

    public function store(Request $request)
    {
        ElectricityGenerate::create($request->validate([
            'province' => "required",
            'fiscal_year' => "required",
            'quantity' => "required",
        ]));
        return redirect()->back()->with('success', "विधुत उत्पादनको सफलतापूर्वक थपियो");
    }

    public function destroy(ElectricityGenerate $electricityGenerate)
    {
        $electricityGenerate->delete();
        return redirect()->back()->with('success', "विधुत उत्पादनको सफलतापूर्वक हटाइयो");
    }

    public function edit(ElectricityGenerate $electricityGenerate)
    {
        $electricityGenerates = ElectricityGenerate::get();
        $fiscalYears = FiscalYear::get();
        $provinces = Province::get();
        return view('infrastructureDevelopment.electricityGenerate.index', compact(['electricityGenerate', 'electricityGenerates', 'fiscalYears', 'provinces']));
    }

    public function update(Request $request, ElectricityGenerate $electricityGenerate)
    {
        $electricityGenerate->update($request->validate([
            'province' => "required",
            'fiscal_year' => "required",
            'quantity' => "required",
        ]));
        return redirect()->route("elecricity-generate.index")->with('success', "विधुत उत्पादनको सफलतापूर्वक परिवर्तन भयो");
    }
}
