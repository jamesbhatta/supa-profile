<?php

namespace App\Http\Controllers;

use App\RoadNetwork;
use Illuminate\Http\Request;

class RoadNetworkController extends Controller
{
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
        return redirect()->back()->with('success',"Added");
    }
    public function destroy(RoadNetwork $roadNetwork)
    {
        $roadNetwork->delete();
        return redirect()->back()->with('success',"Deleted");
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
        return redirect()->route('road-network.index')->with('success',"Updated");
    }

}
