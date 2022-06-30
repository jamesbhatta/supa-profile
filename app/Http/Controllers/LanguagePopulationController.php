<?php

namespace App\Http\Controllers;

use App\LanguagePopulation;
use Illuminate\Http\Request;

class LanguagePopulationController extends Controller
{

    public function listing()
    {
        $data = LanguagePopulation::get();
        $dataset['labels'] = ["क्र.स.", "भाषा", "जनसंख्या", "प्रतिशत"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $item->$item+1,
                $item->language,
                $item->population,
                $item->percentage,
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(LanguagePopulation $languagePopulation)
    {
        $languagePopulations=LanguagePopulation::get();
        return view('populations.language_population.index',compact(['languagePopulation','languagePopulations']));
    }

    public function store(Request $request)
    {
        LanguagePopulation::create($request->validate([
            'language'=>"required",
            'population'=>"required",
            'percentage'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }

    public function edit(LanguagePopulation $languagePopulation)
    {
        $languagePopulations=LanguagePopulation::get();
        return view('populations.language_population.index',compact(['languagePopulation','languagePopulations']));
    }

    public function update(Request $request, LanguagePopulation $languagePopulation)
    {
        $languagePopulation->update($request->validate([
            'language'=>"required",
            'population'=>"required",
            'percentage'=>"required",
        ]));
        return redirect()->route("language-population.index")->with('success',"Updated");
    }

    public function destroy(LanguagePopulation $languagePopulation)
    {
        $languagePopulation->delete();
        return redirect()->back()->with('success',"Removed");
    }

}
