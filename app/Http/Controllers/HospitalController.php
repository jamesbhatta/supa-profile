<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\Province;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function listing()
    {
        $data = Hospital::get();
        $dataset['labels'] = ["विवरण","जिल्ला","Number"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                // $key + 1,
                $item->area,
                $item->district,
                $item->num,
               
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(Hospital $hospital)
    {
        $hospitals=Hospital::get();
        $provinces=Province::get();
        return view('socialStatus.hospital.index',compact(['hospital','hospitals','provinces']));
    }

    public function store(Request $request)
    {
        Hospital::create($request->validate([
            'area'=>"required",
            'district'=>"required",
            'num'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(Hospital $hospital)
    {
        $hospitals=Hospital::get();
        $provinces=Province::get();
        return view('socialStatus.hospital.index',compact(['hospital','hospitals','provinces']));
    }

    public function update(Request $request, Hospital $hospital)
    {
        $hospital->update($request->validate([
            'area'=>"required",
            'district'=>"required",
            'num'=>"required",
        ]));
        return redirect()->route("hospital.index")->with('success',"Updated");
    }

    public function destroy(Hospital $hospital)
    {
        $hospital->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
