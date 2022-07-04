<?php

namespace App\Http\Controllers;

use App\GeographicalAreaPopulation;
use Illuminate\Http\Request;

class GeographicalAreaPopulationController extends Controller
{
    public function listingGeographicalAreaPopulation()
    {
        $data = GeographicalAreaPopulation::get();
        $dataset['labels'] = ["क्षेत्र", "जनसङ्ख्या", "क्षेत्रफल (वर्ग कि.मि.)", "जनघनत्व(जना/वर्ग कि.मि.)"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->sector,
                $item->population,
                $item->area,
                $item->density
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(GeographicalAreaPopulation $geographicalPopulation)
    {
        $geographicalpopulations = GeographicalAreaPopulation::all();
        return view('populations.geographical.index', compact(['geographicalpopulations', 'geographicalPopulation']));
    }
    public function store(Request $request)
    {
        GeographicalAreaPopulation::create($request->validate([
            'sector' => "required",
            'population' => "required|min:3|max:8",
            'area' => "required|min:3|max:7",
            'density' => "required|min:3|max:5",
        ]));
        return redirect()->back()->with('success', "क्षेत्रगत जनसंख्या तथा जनघनत्व विवरण सफलतापूर्वक थपियो");
    }
    public function destroy(GeographicalAreaPopulation $geographicalPopulation)
    {
        $geographicalPopulation->delete();
        return redirect()->back()->with('success', "क्षेत्रगत जनसंख्या तथा जनघनत्व विवरण सफलतापूर्वक हटाइयो");
    }
    public function edit(GeographicalAreaPopulation $geographicalPopulation)
    {
        $geographicalpopulations = GeographicalAreaPopulation::all();
        return view('populations.geographical.index', compact(['geographicalpopulations', 'geographicalPopulation']));
    }
    public function update(Request $request, GeographicalAreaPopulation $geographicalPopulation)
    {
        $geographicalPopulation->update($request->validate([
            'sector' => "required",
            'population' => "required|min:3|max:8",
            'area' => "required|min:3|max:7",
            'density' => "required|min:3|max:5",
        ]));
        return redirect()->route('geographical-population.index')->with('success', "क्षेत्रगत जनसंख्या तथा जनघनत्व विवरण सफलतापूर्वक परिवर्तन भयो");
    }
}
