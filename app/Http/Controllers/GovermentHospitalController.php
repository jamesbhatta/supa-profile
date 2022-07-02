<?php

namespace App\Http\Controllers;

use App\GovermentHospital;
use App\Municipality;
use App\Province;
use Illuminate\Http\Request;

class GovermentHospitalController extends Controller
{

    public function listing()
    {
        $data = GovermentHospital::get();
        $dataset['labels'] = ["अस्पतालको नाम","जिल्ला","पालिका"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                // $key + 1,
                $item->name,
                $item->district,
                $item->municipality,
               
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(GovermentHospital $govermentHospital)
    {
        $govermentHospitals=GovermentHospital::get();
        $provinces=Province::get();
        $municipalities=Municipality::get();
        return view('socialStatus.goverment_hospital.index',compact(['govermentHospitals','govermentHospital','provinces','municipalities']));
    }

    public function store(Request $request)
    {
        GovermentHospital::create($request->validate([
            'name'=>"required",
            'district'=>"required",
            'municipality'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(GovermentHospital $govermentHospital)
    {
        $govermentHospitals=GovermentHospital::get();
        $provinces=Province::get();
        $municipalities=Municipality::get();
        return view('socialStatus.goverment_hospital.index',compact(['govermentHospitals','govermentHospital','provinces','municipalities']));
    }

    public function update(Request $request,GovermentHospital $govermentHospital)
    {
        $govermentHospital->update($request->validate([
            'name'=>"required",
            'district'=>"required",
            'municipality'=>"required",
        ]));

        return redirect()->route("goverment-hospital.index")->with('success',"Updated");
    }

    public function destroy(GovermentHospital $govermentHospital)
    {
        $govermentHospital->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
