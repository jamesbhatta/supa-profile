<?php

namespace App\Http\Controllers;

use App\Nutrition;
use Illuminate\Http\Request;

class NutritionController extends Controller
{
    public function listing()
    {
        $data = Nutrition::get();
        $dataset['labels'] = ["बिबरण","राष्ट्रिय","प्रदेश","प्सुचनाको श्रोत(नेपाल जनसांक्षख्यक र स्वास््य सबेिण २०१६)"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                // $key + 1,
                $item->detail,
                $item->national,
                $item->provincinal,
                $item->source,
             
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(Nutrition $nutrition)
    {
        $nutritions=Nutrition::get();
        return view('socialStatus.nutrition.index',compact('nutrition','nutritions'));
    }

    public function store(Request $request)
    {
        Nutrition::create($request->validate([
            'detail'=>"required",
            'national'=>"required",
            'provincinal'=>"required",
            'source'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(Nutrition $nutrition)
    {
        $nutritions=Nutrition::get();
        return view('socialStatus.nutrition.index',compact('nutrition','nutritions'));
    }

    public function update(Request $request, Nutrition $nutrition)
    {
        $nutrition->update($request->validate([
            'detail'=>"required",
            'national'=>"required",
            'provincinal'=>"required",
            'source'=>"required",
        ]));
        return redirect()->route("nutrition.index")->with('success',"Updated");
    }

    public function destroy(Nutrition $nutrition)
    {
        $nutrition->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
