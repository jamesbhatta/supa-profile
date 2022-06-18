<?php

namespace App\Http\Controllers;

use App\Province;
use App\Radio;
use Illuminate\Http\Request;

class RadioController extends Controller
{
    public function listingRadio()
    {
        $data = Radio::get();
        $dataset['labels'] = ["जिल्ला", "एफएम रेडियोको संख्या"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                
                $item->district,
                $item->number,
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(Radio $radio)
    {
        $radios=Radio::get();
        $provinces=Province::get();
        return view('infrastructureDevelopment.radio.index',compact(['radios','radio','provinces']));
    }

    public function store(Request $request)
    {
        Radio::create($request->validate([
            'district'=>"required",
            'number'=>"required"
        ]));
        return redirect()->back()->with('success',"एफएम रेडियो सफलतापूर्वक थपियो");
    }

    public function destroy(Radio $radio)
    {
        $radio->delete();
        return redirect()->back()->with('success',"एफएम रेडियो सफलतापूर्वक हटाइयो");
    }
    public function edit(Radio $radio)
    {
        $radios=Radio::get();
        $provinces=Province::get();
        return view('infrastructureDevelopment.radio.index',compact(['radios','radio','provinces']));
    }

    public function update(Request $request, Radio $radio)
    {
        $radio->update($request->validate([
            'district'=>"required",
            'number'=>"required"
        ]));
        return redirect()->route("radio.index")->with('success',"एफएम रेडियो परिवर्तन भयो");
    }

}
