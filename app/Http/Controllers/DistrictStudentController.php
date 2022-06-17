<?php

namespace App\Http\Controllers;

use App\District;
use App\DistrictStudent;
use App\Province;
use Illuminate\Http\Request;

class DistrictStudentController extends Controller
{
    public function index(DistrictStudent $districtStudent)
    {
        $districtStudents=DistrictStudent::all();
        $districts=District::all();
        $provinces=Province::all();
        return view('socialStatus.districtWiseStudent.index',compact(['districtStudent','provinces','districtStudents','districts']));
    }
    public function store(Request $request)
    {
        DistrictStudent::create($request->validate([
            'district'=>"required",
            'class'=>"required",
            'female'=>"required",
            'male'=>"required",
        ]));
        return redirect()->back()->with('success',"Added");
    }

    public function destroy(DistrictStudent $districtStudent)
    {
        $districtStudent->delete();
        return redirect()->back()->with('success',"Delete");
    }

    public function edit(DistrictStudent $districtStudent)
    {
        $districtStudents=DistrictStudent::all();
        $districts=District::all();
        $provinces=Province::all();
        return view('socialStatus.districtWiseStudent.index',compact(['districtStudent','provinces','districtStudents','districts']));
    }

    public function update(Request $request,DistrictStudent $districtStudent)
    {
        $districtStudent->update($request->validate([
            'district'=>"required",
            'class'=>"required",
            'fmale'=>"required",
            'male'=>"required",
        ]));

        return redirect()->route("district-student.index")->with('success',"Updated");
    }

}
