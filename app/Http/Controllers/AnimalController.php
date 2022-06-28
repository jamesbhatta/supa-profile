<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Province;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
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
