<?php

namespace App\Http\Controllers;

use App\Miles;
use App\Province;
use Illuminate\Http\Request;

class MilesController extends Controller
{

    public function listing()
    {
        $data = Miles::get();
        $dataset['labels'] = ["क्र.स.", "खानी", "जिल्ला", "अवस्था"];
        // $dataset['backgroundColor'] = ["red", "green", "blue"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key=$key+1,
                $item->miles,
                $item->district,
                $item->status,
                
            ];
        }

        return response()->json($dataset, 200);
    }


    public function index(Miles $miles)
    {
        $miless=Miles::get();
        $provinces=Province::get();
        return view('business.khani.index',compact(['miles','miless','provinces']));
    }

    public function store(Request $request)
    {
        Miles::create($request->validate([
            'miles'=>"required",
            'district'=>"required",
            'status'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(Miles $miles)
    {
        $miless=Miles::get();
        $provinces=Province::get();
        return view('business.khani.index',compact(['miles','miless','provinces']));
    }

    public function update(Request $request, Miles $miles)
    {
        $miles->update($request->validate([
            'miles'=>"required",
            'district'=>"required",
            'status'=>"required",
        ]));
        return redirect()->route("miles.index")->with('success',"Updated");
    }

    public function destroy(Miles $miles)
    {
        $miles->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
