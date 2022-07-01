<?php

namespace App\Http\Controllers;

use App\DalitStudent;
use App\Province;
use Illuminate\Http\Request;

class DalitStudentController extends Controller
{

    public function listing()
    {
        $data = DalitStudent::get();
        $dataset['labels'] = ["क्र.स.","जिल्ला","कक्षा ", "छात्रा", "छात्र"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->district,
                $item->class,
                $item->male,
                $item->female,
               
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(DalitStudent $dalitStudent)
    {
        $dalitStudents = DalitStudent::get();
        $provinces = Province::get();
        return view('socialStatus.dalit_student.index', compact(['dalitStudent', 'dalitStudents', 'provinces']));
    }

    public function store(Request $request)
    {
        DalitStudent::create($request->validate([
            'district' => "required",
            'class' => "required",
            'male' => "required",
            'female' => "required",
        ]));
        return redirect()->back()->with('success', "Saved");
    }

    public function edit(DalitStudent $dalitStudent)
    {
        $dalitStudents = DalitStudent::get();
        $provinces = Province::get();
        return view('socialStatus.dalit_student.index', compact(['dalitStudent', 'dalitStudents', 'provinces']));
    }

    public function update(Request $request, DalitStudent $dalitStudent)
    {
        $dalitStudent->update($request->validate([
            'district' => "required",
            'class' => "required",
            'male' => "required",
            'female' => "required",
        ]));

        return redirect()->route("dalit-student.index")->with('success', "Updated");
    }

    public function destroy(DalitStudent $dalitStudent)
    {
        $dalitStudent->delete();
        return redirect()->back()->with('success', "Removed");
    }
}
