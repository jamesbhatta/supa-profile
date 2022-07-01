<?php

namespace App\Http\Controllers;

use App\Balbikas;
use App\Province;
use Illuminate\Http\Request;

class BalbikasController extends Controller
{
    public function listing()
    {
        
        $data =Balbikas::get();
        
        $dataset['labels'] = ["जिल्ला ", "छात्रा", "छात्र", "जम्मा", "छात्रा", "छात्र", "जम्मा", "छात्रा", "छात्र", "जम्मा"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $item->district,
                $item->balbikash_female,
                $item->balbikash_male,
                $item->balbikash_female+$item->balbikash_male,
                $item->female,
                $item->male,
                $item->male+$item->female,
                $item->balbikash_female+$item->female,
                $item->balbikash_male+$item->male,
                $item->balbikash_female+$item->balbikash_male+$item->male+$item->female,
            ];
            
        }
        
        

        return response()->json($dataset, 200);
    }
    public function index(Balbikas $balbikas)
    {
        $balbikases=Balbikas::get();
        $provinces=Province::get();
        return view("socialStatus.balbikash.index",compact(['balbikas','balbikases','provinces']));
    }

    public function store(Request $request)
    {
        Balbikas::create($request->validate([
            'district'=>"required",
            'balbikash_female'=>"required",
            'balbikash_male'=>"required",
            'male'=>"required",
            'female'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(Balbikas $balbikas)
    {
        $balbikases=Balbikas::get();
        $provinces=Province::get();
        return view("socialStatus.balbikash.index",compact(['balbikas','balbikases','provinces']));
    }

    public function update(Request $request, Balbikas $balbikas)
    {
        $balbikas->update($request->validate([
            'district'=>"required",
            'balbikash_female'=>"required",
            'balbikash_male'=>"required",
            'male'=>"required",
            'female'=>"required",
        ]));

        return redirect()->route("balbikash.index")->with('success',"Updated");
    }

    public function destroy(Balbikas $balbikas)
    {
        $balbikas->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
