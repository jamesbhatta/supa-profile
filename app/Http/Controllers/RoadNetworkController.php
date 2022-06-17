<?php

namespace App\Http\Controllers;

use App\RoadNetwork;
use Illuminate\Http\Request;

class RoadNetworkController extends Controller
{
    public function listingRoadNetwork()
    {
        $data = RoadNetwork::get();
        $dataset['labels'] = ["क्र.स.", "सडक सञ्जाल", "सुदूरपश्चिममा लम्बाई (कि.मि)", "नेपाल (कि.मि.)"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->road,
                $item->supa_lenght,
                $item->npl_lenght
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(RoadNetwork $roadNetwork)
    {
        $roadNetworks=RoadNetwork::all();
        return view('infrastructureDevelopment.roadMap.index',compact(['roadNetworks','roadNetwork']));
    }
    public function store(Request $request)
    {
        RoadNetwork::create($request->validate([
            'road'=>"required",
            'supa_lenght'=>"required",
            'npl_lenght'=>"required",
        ]));
        return redirect()->back()->with('success',"सडक सञ्जाल सफलतापूर्वक थपियो");
    }
    public function destroy(RoadNetwork $roadNetwork)
    {
        $roadNetwork->delete();
        return redirect()->back()->with('success',"सडक सञ्जाल सफलतापूर्वक हटाइयो");
    }
    public function edit(RoadNetwork $roadNetwork)
    {
        $roadNetworks=RoadNetwork::all();
        return view('infrastructureDevelopment.roadMap.index',compact(['roadNetworks','roadNetwork']));
    }
    public function update(Request $request, RoadNetwork $roadNetwork)
    {
        $roadNetwork->update($request->validate([
            'road'=>"required",
            'supa_lenght'=>"required",
            'npl_lenght'=>"required",
        ]));
        return redirect()->route('road-network.index')->with('success',"सडक सञ्जाल सफलतापूर्वक परिवर्तन भयो");
    }

}
