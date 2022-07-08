<?php

namespace App\Http\Controllers;

use App\Province;
use App\SampleSchool;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Helper\Sample;

class SampleSchoolController extends Controller
{

    public function listing()
    {
        $data = SampleSchool::with('district')->get();
        $dataset['labels'] = ["जिल्ला", "नमूना विद्यालयको नाम", "ठेगाना"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                // $key + 1,
                $item->district->name,
                $item->name,
                $item->address,
                
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(SampleSchool $sampleSchool)
    {
        $sampleSchools=SampleSchool::with('district')->get();
        // return $sampleSchools;
        $provinces=Province::get();
        return view('socialStatus.sample_school.index',compact(['sampleSchool','sampleSchools','provinces']));
    }

    public function store(Request $request)
    {
        SampleSchool::create($request->validate([
            'district_id'=>"required",
            'name'=>"required",
            'address'=>"required",
        ]));

        return redirect()->back()->with('success',"Saved");
    }

    public function edit(SampleSchool $sampleSchool)
    {
        $sampleSchools=SampleSchool::get();
        $provinces=Province::get();
        return view('socialStatus.sample_school.index',compact(['sampleSchool','sampleSchools','provinces']));
    }

    public function update(Request $request, SampleSchool $sampleSchool)
    {

        // return $request;
        $sampleSchool->update($request->validate([
            'district_id'=>"required",
            'name'=>"required",
            'address'=>"required",
        ]));
        return redirect()->route("sample-school.index")->with('success',"Updated");
    }
    public function destroy(SampleSchool $sampleSchool)
    {
        $sampleSchool->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
