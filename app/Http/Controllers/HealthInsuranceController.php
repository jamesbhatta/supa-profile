<?php

namespace App\Http\Controllers;

use App\HealthInsurance;
use App\Province;
use Illuminate\Http\Request;

class HealthInsuranceController extends Controller
{
    public function listing()
    {
        $data = HealthInsurance::get();
        $dataset['labels'] = ["क्र.स.","जिल्ला","वीमित पुरुष","	वीमित महिला","	जम्मा वीमित सदस्य"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->district,
                $item->male,
                $item->female,
                $item->female+$item->male,
               
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(HealthInsurance $healthInsurance)
    {
        $healthInsurances=HealthInsurance::get();
        $provinces=Province::get();
        return view('socialStatus.health_insurance.index',compact(['healthInsurance','healthInsurances','provinces']));
    }

    public function store(Request $request)
    {
        HealthInsurance::create($request->validate([
            'district'=>"required",
            'male'=>"required",
            'female'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(HealthInsurance $healthInsurance)
    {
        $healthInsurances=HealthInsurance::get();
        $provinces=Province::get();
        return view('socialStatus.health_insurance.index',compact(['healthInsurance','healthInsurances','provinces']));
    }

    public function update(Request $request, HealthInsurance $healthInsurance)
    {
        $healthInsurance->update($request->validate([
            'district'=>"required",
            'male'=>"required",
            'female'=>"required",
        ]));
        return redirect()->route("helth-insurance.index")->with('success',"Updated");
    }

    public function destroy(HealthInsurance $healthInsurance)
    {
        $healthInsurance->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
