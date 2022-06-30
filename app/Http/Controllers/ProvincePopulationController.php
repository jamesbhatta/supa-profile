<?php

namespace App\Http\Controllers;

use App\Province;
use App\ProvincePopulation;
use Illuminate\Http\Request;

class ProvincePopulationController extends Controller
{

    public function listing()
    {
        $data = ProvincePopulation::get();
        $dataset['labels'] = ["प्रदेश", "जनसङ्ख्या", "प्रतिशत", "जनसंख्या बृद्धिदर"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [

                $item->province,
                $item->population,
                $item->percentage,
                $item->population_increase_rate,
               
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(ProvincePopulation $provincePopulation)
    {
        $provincePopulations = ProvincePopulation::get();
        $provinces = Province::get();
        return view('populations.province_population.index', compact(['provincePopulations', 'provincePopulation', 'provinces']));
    }

    public function store(Request $request)
    {
        ProvincePopulation::create($request->validate([
            'province' => "required",
            'population' => "required",
            'percentage' => "required",
            'population_increase_rate' => "required",
        ]));
        return redirect()->back()->with('success', "Saved");
    }

    public function edit(ProvincePopulation $provincePopulation)
    {
        $provincePopulations = ProvincePopulation::get();
        $provinces = Province::get();
        return view('populations.province_population.index', compact(['provincePopulations', 'provincePopulation', 'provinces']));
    }

    public function update(Request $request, ProvincePopulation $provincePopulation)
    {
        $provincePopulation->update($request->validate([
            'province' => "required",
            'population' => "required",
            'percentage' => "required",
            'population_increase_rate' => "required",
        ]));
        return redirect()->route("province-population.index")->with('success', "Updated");
    }

    public function destroy(ProvincePopulation $provincePopulation)
    {
        $provincePopulation->delete();
        return redirect()->back()->with('success', "Saved");
    }
}
