<?php

namespace App\Http\Controllers;

use App\NewsPaper;
use App\Province;
use Illuminate\Http\Request;

class NewsPaperController extends Controller
{
    public function listingNewsPaper()
    {
        $data = NewsPaper::get();
        $dataset['labels'] = ["जिल्ला", "दैनिक", "अर्ध साप्ताहिक", "साप्ताहिक", "पाक्षिक", "मासिक", "द्धैमासिक", "त्रैमासिक", "जम्मा"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                
                $item->district,
                $item->daily,
                $item->half_weakly,
                $item->weakly,
                $item->fortnightly,
                $item->monthly,
                $item->monthly_twise,
                $item->monthly_thirds,
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(NewsPaper $newsPaper)
    {
        $provinces=Province::get();
        $newsPapers=NewsPaper::get();
        return view('infrastructureDevelopment.newsPaper.index',compact(['newsPapers','newsPaper','provinces']));
    }

    public function store(Request $request)
    {
        NewsPaper::create($request->validate([
            'district'=>"required",
            'daily'=>"required",
            'half_weakly'=>"required",
            'weakly'=>"required",
            'fortnightly'=>"required",
            'monthly'=>"required",
            'monthly_twise'=>"required",
            'monthly_thirds'=>"required",
        ]));
        return redirect()->back()->with('success',"पत्रपत्रिका सफलतापूर्वक थपियो");
    }

    public function destroy(NewsPaper $newsPaper)
    {
        $newsPaper->delete();
        return redirect()->back()->with('success',"पत्रपत्रिका सफलतापूर्वक हटाइयो");
    }
    public function edit(NewsPaper $newsPaper)
    {
        $provinces=Province::get();
        $newsPapers=NewsPaper::get();
        return view('infrastructureDevelopment.newsPaper.index',compact(['newsPapers','newsPaper','provinces']));
    }

    public function update(Request $request, NewsPaper $newsPaper)
    {
        $newsPaper->update($request->validate([
            'district'=>"required",
            'daily'=>"required",
            'half_weakly'=>"required",
            'weakly'=>"required",
            'fortnightly'=>"required",
            'monthly'=>"required",
            'monthly_twise'=>"required",
            'monthly_thirds'=>"required",
        ]));
        return redirect()->route("news-paper.index")->with('success',"पत्रपत्रिका परिवर्तन भयो");
    }
}
