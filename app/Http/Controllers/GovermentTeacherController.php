<?php

namespace App\Http\Controllers;

use App\GovermentTeacher;
use App\Province;
use Illuminate\Http\Request;

class GovermentTeacherController extends Controller
{
    public function listing()
    {
        $data = GovermentTeacher::get();
        $dataset['labels'] = ["क्र.स.","जिल्ला","विद्यालयको प्रकार", "राहत", "दरबन्दी"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->district,
                $item->type,
                $item->rahat,
                $item->darbandi,
               
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(GovermentTeacher $govermentTeacher)
    {
        $govermentTeachers=GovermentTeacher::get();
        $provinces=Province::get();
        return view('socialStatus.goverment_teacher.index',compact(['govermentTeacher','govermentTeachers','provinces']));
    }

    public function store(Request $request)
    {
        GovermentTeacher::create($request->validate([
            'district'=>"required",
            'type'=>"required",
            'rahat'=>"required",
            'darbandi'=>"required",
        ]));

        return redirect()->back()->with('success',"saved");
    }

    public function edit(GovermentTeacher $govermentTeacher)
    {
        $govermentTeachers=GovermentTeacher::get();
        $provinces=Province::get();
        return view('socialStatus.goverment_teacher.index',compact(['govermentTeacher','govermentTeachers','provinces']));
    }

    public function update(Request $request,GovermentTeacher $govermentTeacher)
    {
        $govermentTeacher->update($request->validate([
            'district'=>"required",
            'type'=>"required",
            'rahat'=>"required",
            'darbandi'=>"required",
        ]));
        return redirect()->route("goverment-teacher.index")->with('success',"Updated");
    }

    public function destroy(GovermentTeacher $govermentTeacher)
    {
        $govermentTeacher->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
