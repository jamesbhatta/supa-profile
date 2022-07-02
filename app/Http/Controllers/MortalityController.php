<?php

namespace App\Http\Controllers;

use App\Mortality;
use Illuminate\Http\Request;

class MortalityController extends Controller
{

    public function listing()
    {
        $data = Mortality::get();
        $dataset['labels'] = ["विवरण","राष्ट्रिय","प्रदेश","सूचनाको श्रोत"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                // $key + 1,
                $item->detail,
                $item->national,
                $item->provincenal,
                $item->source,
               
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(Mortality $mortality)
    {
        $mortalitys=Mortality::get();
        return view('socialStatus.mortality.index',compact(['mortality','mortalitys']));
    }

    public function store(Request $request)
    {
        Mortality::create($request->validate([
            'detail'=>"required",
            'national'=>"required",
            'provincenal'=>"required",
            'source'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(Mortality $mortality)
    {
        $mortalitys=Mortality::get();
        return view('socialStatus.mortality.index',compact(['mortality','mortalitys']));
    }

    public function update(Request $request, Mortality $mortality)
    {
        $mortality->update($request->validate([
            'detail'=>"required",
            'national'=>"required",
            'provincenal'=>"required",
            'source'=>"required", 
        ]));
        return redirect()->route("mortality.index")->with('success',"Updated");
    }

    public function destroy(Mortality $mortality)
    {
        $mortality->delete();
        return redirect()->back()->with('success','Removed');
    }
}
