<?php

namespace App\Http\Controllers;

use App\JanjatiStudent;
use App\Province;
use Illuminate\Http\Request;

class JanjatiStudentController extends Controller
{

    public function listing()
    {
        $data = JanjatiStudent::get();
        $dataset['labels'] = ["क्र.स.", "जिल्ला", "कक्षा ", "छात्रा", "छात्र"];
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

    public function index(JanjatiStudent $janjatiStudent)
    {
        $janjatiStudents = JanjatiStudent::get();
        $provinces = Province::get();
        return view("socialStatus.janjati_student.index", compact(['janjatiStudent', 'janjatiStudents', 'provinces']));
    }

    public function store(Request $request)
    {
        JanjatiStudent::create($request->validate([
            'district' => "required",
            'class' => "required",
            'male' => "required",
            'female' => "required",
        ]));
        return redirect()->back()->with('success', "Saved");
    }

    public function edit(JanjatiStudent $janjatiStudent)
    {
        $janjatiStudents = JanjatiStudent::get();
        $provinces = Province::get();
        return view("socialStatus.janjati_student.index", compact(['janjatiStudent', 'janjatiStudents', 'provinces']));
    }

    public function update(Request $request, JanjatiStudent $janjatiStudent)
    {
        $janjatiStudent->update($request->validate([
            'district' => "required",
            'class' => "required",
            'male' => "required",
            'female' => "required",
        ]));

        return redirect()->route("janjati-student.index")->with('success', "Updated");
    }

    public function destroy(JanjatiStudent $janjatiStudent)
    {
        $janjatiStudent->delete();
        return redirect()->back()->with('success', "Removed");
    }
}
