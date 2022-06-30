<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Province;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function listingAnimal()
    {
        $data = Animal::get();
        $dataset['labels'] = ["सि.न.", "उत्पादन", "प्रादेसिक उत्पादन", "प्रादेसिक उपलव्धता", "उपलव्धता राष्ट्रिय ", "प्रती व्यक्ति प्रती बर्ष आवश्यकता", "राष्ट्रिय उत्पादनमा योगदान"];
        // $dataset['backgroundColor'] = ["red", "green", "blue"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $item->$item+1,
                $item->production,
                $item->province_production,
                $item->province_availability,
                $item->availability,
                $item->pbr,
                $item->npc,
                
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(Animal $animal)
    {
        $animals=Animal::get();
        $provinces=Province::get();
        return view("agriculture.animal.index",compact(['animal','animals','provinces']));
    }

    public function store(Request $request)
    {
        Animal::create($request->validate([
            'production'=>"required",
            'province_production'=>"required",
            'province_availability'=>"required",
            'availability'=>"required",
            'pbr'=>"required",
            'npc'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }
    public function edit(Animal $animal)
    {
        $animals=Animal::get();
        $provinces=Province::get();
        return view("agriculture.animal.index",compact(['animal','animals','provinces']));
    }

    public function update(Request $request, Animal $animal)
    {
        $animal->update($request->validate([
            'production'=>"required",
            'province_production'=>"required",
            'province_availability'=>"required",
            'availability'=>"required",
            'pbr'=>"required",
            'npc'=>"required",
        ]));
        return redirect()->route("animal.index")->with('success',"Updated");
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
