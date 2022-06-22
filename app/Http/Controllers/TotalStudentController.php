<?php

namespace App\Http\Controllers;

use App\TotalStudent;
use Illuminate\Http\Request;

class TotalStudentController extends Controller
{
    public function listingTotalStudent()
    {
        $data = TotalStudent::get();
        $dataset['labels'] = ["कक्षा ", "छात्रा", "छात्र", "जम्मा", "छात्रा", "छात्र", "जम्मा", "छात्रा", "छात्र", "जम्मा"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                // $key + 1,
                $item->class,
                $item->g_fmale,
                $item->g_male,
                $item->g_male+$item->g_fmale,
                $item->p_fmale,
                $item->p_male,
                $item->p_male+$item->p_fmale,
                $item->g_fmale+$item->p_fmale,
                $item->g_male+$item->p_male,
                $item->g_fmale+$item->p_fmale+$item->g_male+$item->p_male,
            ];
        }

        return response()->json($dataset, 200);
    }
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
        return redirect()->back()->with('success',"कूल विद्यार्थी संख्या विवरण सफलतापूर्वक थपियो");
    }

    public function destroy(TotalStudent $totalStudent)
    {
        $totalStudent->delete();
        return redirect()->back()->with('success',"कूल विद्यार्थी संख्या विवरण सफलतापूर्वक हटाइयो");
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
        return redirect()->route("total-student.index")->with('success',"कूल विद्यार्थी संख्या विवरण सफलतापूर्वक परिवर्तन भयो");
    }
}
