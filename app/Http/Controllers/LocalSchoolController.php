<?php

namespace App\Http\Controllers;

use App\LocalSchool;
use App\Province;
use Illuminate\Http\Request;

class LocalSchoolController extends Controller
{
    public function listing()
    {
        $data = LocalSchool::get();
        $dataset['labels'] = ["जिल्ला", "नमूना विद्यालयको नाम", "सञ्चालित कार्यक्रम"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                // $key + 1,
                $item->district_id,
                $item->name,
                $item->program,
                
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(LocalSchool $localSchool)
    {
        $localSchools=LocalSchool::with('district')->get();
        $provinces=Province::get();
        return view('socialStatus.local_school.index',compact(['localSchool','localSchools','provinces']));
    }

    public function store(Request $request)
    {
        LocalSchool::create($request->validate([
            'district_id'=>"required",
            'name'=>"required",
            'program'=>"required",
        ]));

        return redirect()->back()->with('success',"Saved");
    }

    public function edit(LocalSchool $localSchool)
    {
        $localSchools=LocalSchool::with('district')->get();
        $provinces=Province::get();
        return view('socialStatus.local_school.index',compact(['localSchool','localSchools','provinces']));
    }

    public function update(Request $request, LocalSchool $localSchool)
    {
        $localSchool->update($request->validate([
            'district_id'=>"required",
            'name'=>"required",
            'program'=>"required",
        ]));
        return redirect()->route("local-school.index")->with('success',"Updated");
    }

    public function destroy(LocalSchool $localSchool)
    {
        $localSchool->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
