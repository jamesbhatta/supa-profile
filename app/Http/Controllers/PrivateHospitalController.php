<?php

namespace App\Http\Controllers;

use App\PrivateHospital;
use App\Province;
use Illuminate\Http\Request;

class PrivateHospitalController extends Controller
{

    public function listing()
    {
        $data = PrivateHospital::get();
        $dataset['labels'] = ["क्र.स.","अस्पतालको नाम","जिल्ला"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->name,
                $item->district,
               
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(PrivateHospital $privateHospital)
    {
        $privateHospitals=PrivateHospital::get();
        $provinces=Province::get();
        return view('socialStatus.private_hospital.index',compact(['privateHospital','privateHospitals','provinces']));
    }

    public function store(Request $request)
    {
        PrivateHospital::create($request->validate([
            'name'=>"required",
            'district'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(PrivateHospital $privateHospital)
    {
        $privateHospitals=PrivateHospital::get();
        $provinces=Province::get();
        return view('socialStatus.private_hospital.index',compact(['privateHospital','privateHospitals','provinces']));
    }

    public function update(Request $request, PrivateHospital $privateHospital)
    {
        $privateHospital->update($request->validate([
            'name'=>"required",
            'district'=>"required",
        ]));
        return redirect()->route("private-hospital.index")->with('success',"Updated");
    }

    public function destroy(PrivateHospital $privateHospital)
    {
        $privateHospital->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
