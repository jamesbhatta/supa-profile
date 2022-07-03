<?php

namespace App\Http\Controllers;

use App\Crop;
use App\Province;
use Illuminate\Http\Request;

class CropController extends Controller
{

    public function listing()
    {
        $data =Crop::with('district')->get();
        $dataset['labels'] = ["जिल्लाको नाम", "बालीको नाम", "स्थानीय तह, क्षेत्र"];
        // $dataset['backgroundColor'] = ["red", "green", "blue"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                // $key=$key+1,
                $item->district_id,
                $item->crops,
                $item->area,
                
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(Crop $crop)
    {
        $crops=Crop::with('district')->get();
        $provinces=Province::get();
        return view('agriculture.crops.index',compact(['crops','crop','provinces']));
    }

    public function edit(Crop $crop)
    {
        $crops=Crop::with('district')->get();
        $provinces=Province::get();
        return view('agriculture.crops.index',compact(['crops','crop','provinces']));
    }

    public function store(Request $request)
    {
        Crop::create($request->validate([
            'district_id'=>"required",
            'crops'=>"required",
            'area'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");

    }

    public function update(Request $request, Crop $crop)
    {
        $crop->update($request->validate([
            'district_id'=>"required",
            'crops'=>"required",
            'area'=>"required",
        ]));
        return redirect()->route("crop.index")->with('success',"Updated");
    }

    public function destroy(Crop $crop)
    {
        $crop->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
