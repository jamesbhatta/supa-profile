<?php

namespace App\Http\Controllers;

use App\College;
use App\Province;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function listing()
    {
        $data = College::get();
        $dataset['labels'] = ["क्र.स.","क्याम्पसको नाम","प्रकार ", "जिल्ला", "विश्वविद्यालय"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->name,
                $item->type,
                $item->district,
                $item->university,
               
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(College $college)
    {
        $colleges=College::get();
        $provinces=Province::get();
        return view('socialStatus.college.index',compact(['college','colleges','provinces']));
    }

    public function store(Request $request)
    {
        College::create($request->validate([
            'name'=>"required",
            'type'=>"required",
            'district'=>"required",
            'university'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(College $college)
    {
        $colleges=College::get();
        $provinces=Province::get();
        return view('socialStatus.college.index',compact(['college','colleges','provinces']));
    }

    public function update(Request $request, College $college)
    {
        $college->update($request->validate([
            'name'=>"required",
            'type'=>"required",
            'district'=>"required",
            'university'=>"required",
        ]));
        return redirect()->route("college.index")->with('success',"Updated");
    }

    public function destroy(College $college)
    {
        $college->delete();
        return redirect()->back()->with('success',"Removed");
    }

}
