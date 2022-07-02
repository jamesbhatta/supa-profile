<?php

namespace App\Http\Controllers;

use App\Province;
use App\TeacherRatio;
use Illuminate\Http\Request;

class TeacherRatioController extends Controller
{
    public function listing()
    {
        $data = TeacherRatio::get();
        $dataset['labels'] = ["क्र.स.","जिल्ला","आधारभूत तह (१–५) ", "आधारभूत तह (६–८)", "माध्यमिक तह (९–१०)","माध्यमिक तह (११–१२)"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->district,
                $item->primary,
                $item->primary_1,
                $item->secondary,
                $item->secondary_1,
               
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(TeacherRatio $teacherRatio)
    {
        $teacherRatios=TeacherRatio::get();
        $provinces=Province::get();
        return view('socialStatus.teacher_ratio.index',compact(['teacherRatios','teacherRatio','provinces']));
    }

    public function store(Request $request)
    {
        TeacherRatio::create($request->validate([
            'district'=>"required",
            'primary'=>"required",
            'primary_1'=>"required",
            'secondary'=>"required",
            'secondary_1'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(TeacherRatio $teacherRatio)
    {
        $teacherRatios=TeacherRatio::get();
        $provinces=Province::get();
        return view('socialStatus.teacher_ratio.index',compact(['teacherRatios','teacherRatio','provinces']));
    }

    public function update(Request $request, TeacherRatio $teacherRatio)
    {
        $teacherRatio->update($request->validate([
            'district'=>"required",
            'primary'=>"required",
            'primary_1'=>"required",
            'secondary'=>"required",
            'secondary_1'=>"required",
        ]));
        return redirect()->route("teacher-ratio.index")->with('success',"Updated");
    }
    
    public function destroy(TeacherRatio $teacherRatio)
    {
        $teacherRatio->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
