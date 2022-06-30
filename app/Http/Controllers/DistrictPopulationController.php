<?php

namespace App\Http\Controllers;

use App\District;
use App\DistrictPopulation;
use App\Province;
use Illuminate\Http\Request;

class DistrictPopulationController extends Controller
{
    public function listing()
    {
        $data = DistrictPopulation::get();
        $dataset['labels'] = ["जिल्ला", "घरपरिवार संख्या", "औषत परिवार संख्या", "महिला जनसङ्ख्या", "पुरुष जनसङ्ख्या", "जम्मा जनसङ्ख्या", "प्रदेशको कुल जनसंख्याका प्रतिशत", "लैङ्गिक अनुपात", "जनसंख्या बृद्धिदर", "जनघनत्व( प्रति वग कि.मि.)"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                
                $item->district,
                $item->house_number,
                $item->average_house_number,
                $item->female_number,
                $item->male_number,
                $item->female_number+$item->male_number,
                $item->population_percentage,
                $item->laingik_anupat,
                $item->population_increse_rate,
                $item->dencity,
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(DistrictPopulation $districtPopulation)
    {
        $districtPopulations=DistrictPopulation::get();
        $provinces=Province::get();
        return view('populations.district_population.index',compact(['districtPopulation','districtPopulations','provinces']));
    }

    public function store(Request $request)
    {
        DistrictPopulation::create($request->validate([
            'district'=>"required",
            'house_number'=>"required",
            'average_house_number'=>"required",
            'female_number'=>"required",
            'male_number'=>"required",
            'population_percentage'=>"required",
            'laingik_anupat'=>"required",
            'population_increse_rate'=>"required",
            'dencity'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }
    public function edit(DistrictPopulation $districtPopulation)
    {
        $districtPopulations=DistrictPopulation::get();
        $provinces=Province::get();
        return view('populations.district_population.index',compact(['districtPopulation','districtPopulations','provinces']));
    }

    public function update(Request $request, DistrictPopulation $districtPopulation)
    {
        $districtPopulation->update($request->validate([
            'district'=>"required",
            'house_number'=>"required",
            'average_house_number'=>"required",
            'female_number'=>"required",
            'male_number'=>"required",
            'population_percentage'=>"required",
            'laingik_anupat'=>"required",
            'population_increse_rate'=>"required",
            'dencity'=>"required",
        ]));
        return redirect()->route("district-population.index")->with('success',"Updated");
    }

    public function destroy(DistrictPopulation $districtPopulation)
    {
        $districtPopulation->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
