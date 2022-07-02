<?php

namespace App\Http\Controllers;

use App\Ayourbed;
use App\Province;
use Illuminate\Http\Request;

class AyourbedController extends Controller
{

    public function listing()
    {
        $data = Ayourbed::get();
        $dataset['labels'] = ["जिल्ला","प्रदेशिक चिकित्सालय आयुर्वेद","जिल्ला आयुर्वेद स्वास्थ्य केन्द्र","आयुर्वेद औषधालय","नागरिक आरोग्य सेवा केन्द","पिएचसीमा जीवनशैली कार्यक्रम"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                // $key + 1,
                $item->district,
                $item->pardesika,
                $item->jilla,
                $item->pharmesi,
                $item->arogye_sewa,
                $item->phc,
               
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(Ayourbed $ayourbed)
    {
        $ayourbeds=Ayourbed::get();
        $provinces=Province::get();
        return view('socialStatus.ayourbed_hospital.index',compact(['ayourbed','ayourbeds','provinces']));
    }

    public function store(Request $request)
    {
        Ayourbed::create($request->validate([
            'district'=>"required",
            'pardesika'=>"required",
            'jilla'=>"required",
            'pharmesi'=>"required",
            'arogye_sewa'=>"required",
            'phc'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(Ayourbed $ayourbed)
    {
        $ayourbeds=Ayourbed::get();
        $provinces=Province::get();
        return view('socialStatus.ayourbed_hospital.index',compact(['ayourbed','ayourbeds','provinces']));
    }

    public function update(Request $request, Ayourbed $ayourbed)
    {
        $ayourbed->update($request->validate([
            'district'=>"required",
            'pardesika'=>"required",
            'jilla'=>"required",
            'pharmesi'=>"required",
            'arogye_sewa'=>"required",
            'phc'=>"required",
        ]));
        return redirect()->route("ayourbed-hospital.index")->with('success',"Update");
    }

    public function destroy(Ayourbed $ayourbed)
    {
        $ayourbed->delete();
        return redirect()->back()->with('success',"Removed");
    }
    
}
