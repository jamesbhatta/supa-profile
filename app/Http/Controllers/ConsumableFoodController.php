<?php

namespace App\Http\Controllers;

use App\ConsumableFood;
use App\Province;
use Illuminate\Http\Request;

class ConsumableFoodController extends Controller
{
    public function listingConsumableFood()
    {
        $data = ConsumableFood::get();
        $dataset['labels'] = ["प्रदेश", "जनसंख्या", "चामल", "मकै", "कोदो", "फापर", "गहुँ", "जौ", "उपभोग्य खाद्यान्न उत्पादन", "आवश्यक खाद्यान्न", "बचत वा न्यून"];
        // $dataset['backgroundColor'] = ["red", "green", "blue"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                
                $item->province,
                $item->population,
                $item->rice,
                $item->maize,
                $item->kodo,
                $item->phppar,
                $item->wheat,
                $item->Barley,
                $item->production,
                $item->required_food,
                $item->saving,
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(ConsumableFood $consumableFood)
    {
        $provinces=Province::get();
        $consumableFoods=ConsumableFood::get();
        return view('agriculture.consumable_food.index',compact(['consumableFood','consumableFoods','provinces']));
    }

    public function store(Request $request)
    {
        ConsumableFood::create($request->validate([
            'province'=>"required",
            'population'=>"required",
            'rice'=>"required",
            'maize'=>"required",
            'kodo'=>"required",
            'phppar'=>"required",
            'wheat'=>"required",
            'Barley'=>"required",
            'production'=>"required",
            'required_food'=>"required",
            'saving'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(ConsumableFood $consumableFood)
    {
        $provinces=Province::get();
        $consumableFoods=ConsumableFood::get();
        return view('agriculture.consumable_food.index',compact(['consumableFood','consumableFoods','provinces']));
    }

    public function update(Request $request, ConsumableFood $consumableFood)
    {
        $consumableFood->update($request->validate([
            'province'=>"required",
            'population'=>"required",
            'rice'=>"required",
            'maize'=>"required",
            'kodo'=>"required",
            'phppar'=>"required",
            'wheat'=>"required",
            'Barley'=>"required",
            'production'=>"required",
            'required_food'=>"required",
            'saving'=>"required",
        ]));
        return redirect()->route("consumable-food.index")->with('success',"Updated");
    }

    public function destroy(ConsumableFood $consumableFood)
    {
        $consumableFood->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
