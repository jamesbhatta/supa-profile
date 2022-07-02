<?php

namespace App\Http\Controllers;

use App\Ambulence;
use App\Province;
use Illuminate\Http\Request;

class AmbulenceController extends Controller
{

    public function listing()
    {
        $data = Ambulence::with('district')->get();
        $dataset['labels'] = ["सिन", "जिल्ला", "स्थानीय तह /निकाय", "संचालन गने संस्थाको नाम", "संचालन गने संस्थाको सम्पर्क नम्बर", "एम्बुलेन्स चालकको सम्पर्क नम्बर"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->district->name,
                $item->local_level,
                $item->org,
                $item->org_phone,
                $item->driver_phone,
                
                
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(Ambulence $ambulence)
    {
        $ambulences=Ambulence::with('district')->get();
        $provinces=Province::get();
        return view('socialStatus.ambulence.index',compact(['ambulence','ambulences','provinces']));
    }

    public function store(Request $request)
    {
        Ambulence::create($request->validate([
            'district_id'=>"required",
            'local_level'=>"required",
            'org'=>"required",
            'org_phone'=>"required",
            'driver_phone'=>"required",
        ]));

        return redirect()->back()->with('success',"Saved");
    }

    public function edit(Ambulence $ambulence)
    {
        $ambulences=Ambulence::with('district')->get();
        $provinces=Province::get();
        return view('socialStatus.ambulence.index',compact(['ambulence','ambulences','provinces']));
    }
    public function update(Request $request, Ambulence $ambulence)
    {
        $ambulence->update($request->validate([
            'district_id'=>"required",
            'local_level'=>"required",
            'org'=>"required",
            'org_phone'=>"required",
            'driver_phone'=>"required",
        ]));

        return redirect()->route("ambulence.index")->with('success',"Updated");
    }

    public function destroy(Ambulence $ambulence)
    {
        $ambulence->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
