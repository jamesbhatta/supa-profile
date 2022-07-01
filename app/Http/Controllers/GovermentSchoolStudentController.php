<?php

namespace App\Http\Controllers;

use App\GovermentSchoolStudent;
use App\Province;
use Illuminate\Http\Request;

class GovermentSchoolStudentController extends Controller
{

    public function listing()
    {
        $data = GovermentSchoolStudent::get();
        // $data = GovermentSchoolStudent::where('classes',"०–१ कक्षा")->get();
        $dataset['labels'] = ["क्र.स.", "जिल्ला","कक्षा","छात्र","छात्रा"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $item->$item+1,
                $item->district,
                $item->classes,
                $item->male,
                $item->female,
            ];
            
        }
        
        

        return response()->json($dataset, 200);
    }

    public function index(GovermentSchoolStudent $govermentSchoolStudent)
    {
        $provinces = Province::get();
        $govermentSchoolStudents = GovermentSchoolStudent::get();
        return view('socialStatus.goverment_school_student.index', compact(['provinces', 'govermentSchoolStudent', 'govermentSchoolStudents']));
    }

    public function store(Request $request)
    {
        GovermentSchoolStudent::create($request->validate([
            'district' => "required",
            'classes' => "required",
            'male' => "required",
            'female' => "required",
        ]));

        return redirect()->back()->with('success', "Saved");
    }

    public function edit(GovermentSchoolStudent $govermentSchoolStudent)
    {
        $provinces = Province::get();
        $govermentSchoolStudents = GovermentSchoolStudent::get();
        return view('socialStatus.goverment_school_student.index', compact(['provinces', 'govermentSchoolStudent', 'govermentSchoolStudents']));
    }

    public function update(Request $request, GovermentSchoolStudent $govermentSchoolStudent)
    {
        $govermentSchoolStudent->update($request->validate([
            'district' => "required",
            'classes' => "required",
            'male' => "required",
            'female' => "required",
        ]));
        return redirect()->route("goverment-school-student.index")->with('success', "Updated");
    }

    public function destroy(GovermentSchoolStudent $govermentSchoolStudent)
    {
        $govermentSchoolStudent->delete();
        return redirect()->back()->with('success', "Delete");
    }
}
