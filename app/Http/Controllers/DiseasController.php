<?php

namespace App\Http\Controllers;

use App\Diseas;
use Illuminate\Http\Request;

class DiseasController extends Controller
{

    public function listing()
    {
        $data = Diseas::get();
        $dataset['labels'] = ["रोगको नाम","संख्या","प्रतिशत (जम्मा नयााँ बिरामि मध्ये)","रोगको नाम","संख्या","प्रतिशत (जम्मा नयााँ बिरामि मध्ये)"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                // $key + 1,
                $item->dises,
                $item->national_number,
                $item->national_percentage,
                $item->dises,
                $item->provincenal_number,
                $item->provincenal_percentage,
               
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(Diseas $diseas)
    {
        $diseases=Diseas::get();
        return view('socialStatus.diseas.index',compact(['diseas','diseases']));
    }

    public function store(Request $request)
    {
        Diseas::create($request->validate([
            'dises'=>"required",
            'national_number'=>"required",
            'national_percentage'=>"required",
            'provincenal_number'=>"required",
            'provincenal_percentage'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(Diseas $diseas)
    {
        $diseases=Diseas::get();
        return view('socialStatus.diseas.index',compact(['diseas','diseases']));
    }

    public function update(Request $request,Diseas $diseas)
    {
        $diseas->update($request->validate([
            'dises'=>"required",
            'national_number'=>"required",
            'national_percentage'=>"required",
            'provincenal_number'=>"required",
            'provincenal_percentage'=>"required",
        ]));
        return redirect()->route("diseas.index")->with('success',"Updated");
    }
    public function destroy(Diseas $diseas)
    {
        $diseas->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
