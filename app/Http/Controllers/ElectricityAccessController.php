<?php

namespace App\Http\Controllers;

use App\ElectricityAccess;
use App\Province;
use Illuminate\Http\Request;

class ElectricityAccessController extends Controller
{
    public function listingElectricityAccess()
    {
        $data = ElectricityAccess::get();
        $dataset['labels'] = ["प्रदेश", "पहुँच (प्रतिशत)"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->province,
                $item->accessability,
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(ElectricityAccess $electricityAccess)
    {
        $electricityAccesses=ElectricityAccess::all();
        $provinces=Province::all();
        return view('infrastructureDevelopment.electricityAccess.index',compact(['electricityAccesses','electricityAccess','provinces']));
    }
    public function store(Request $request)
    {
        ElectricityAccess::create($request->validate([
            'province'=>"required",
            'accessability'=>"required",
        ]));
        return redirect()->back()->with('success',"विधुत सेवाको पहुँच सफलतापूर्वक थपियो");
    }
    public function destroy(ElectricityAccess $electricityAccess)
    {
        $electricityAccess->delete();
        return redirect()->back()->with('success',"विधुत सेवाको पहुँच सफलतापूर्वक हटाइयो");
    }
    public function edit(ElectricityAccess $electricityAccess)
    {
        $electricityAccesses=ElectricityAccess::all();
        $provinces=Province::all();
        return view('infrastructureDevelopment.electricityAccess.index',compact(['electricityAccesses','electricityAccess','provinces']));
    }
    public function update(Request $request, ElectricityAccess $electricityAccess)
    {
        $electricityAccess->update($request->validate([
            'province'=>"required",
            'accessability'=>"required",
        ]));
        return redirect()->route('electricity-access.index')->with('success',"विधुत सेवाको पहुँच सफलतापूर्वक परिवर्तन भयो");
    }
}
