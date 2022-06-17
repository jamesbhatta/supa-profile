<?php

namespace App\Http\Controllers;

use App\TotalStudent;
use Illuminate\Http\Request;

class TotalStudentController extends Controller
{
    public function index(TotalStudent $totalStudent)
    {
        $totalStudents=TotalStudent::all();
        return view('socialStatus.totalStudent.index',compact(['totalStudents','totalStudent']));
    }
    public function store(Request $request)
    {
        TotalStudent::create($request->validate([
            'class'=>"required",
            'g_male'=>"required",
            'g_fmale'=>"required",
            'p_male'=>"required",
            'p_fmale'=>"required",
        ]));
        return redirect()->back()->with('success',"Added");
    }

    public function destroy(TotalStudent $totalStudent)
    {
        $totalStudent->delete();
        return redirect()->back()->with('success',"Delete");
    }
    public function edit(TotalStudent $totalStudent)
    {
        $totalStudents=TotalStudent::all();
        return view('socialStatus.totalStudent.index',compact(['totalStudents','totalStudent']));
    }
    public function update(Request $request, TotalStudent $totalStudent)
    {
        $totalStudent->update($request->validate([
            'class'=>"required",
            'g_male'=>"required",
            'g_fmale'=>"required",
            'p_male'=>"required",
            'p_fmale'=>"required",
        ]));
        return redirect()->route("total-student.index")->with('success',"Updated");
    }
}
