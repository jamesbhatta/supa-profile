<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function listing()
    {
        $data = Vehicle::get();
        $dataset['labels'] = ["विवरण", "२०७७ असार मसान्तसम्म", "२०७८ असार मसान्तसम्म", "बृद्धि प्रतिशत"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                // $key + 1,
                $item->vehicle,
                $item->from,
                $item->to,
                $item->increase_rate,
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(Vehicle $vehicle)
    {
        $vehicles = Vehicle::get();
        return view('infrastructureDevelopment.vehicle.index', compact(['vehicle', 'vehicles']));
    }

    public function store(Request $request)
    {
        Vehicle::create($request->validate([
            'vehicle' => "required",
            'from' => "required",
            'to' => "required",
            'increase_rate' => "required",
        ]));
        return redirect()->back()->with('success', "Saved");
    }

    public function edit(Vehicle $vehicle)
    {
        $vehicles = Vehicle::get();
        return view('infrastructureDevelopment.vehicle.index', compact(['vehicle', 'vehicles']));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $vehicle->update($request->validate([
            'vehicle' => "required",
            'from' => "required",
            'to' => "required",
            'increase_rate' => "required",
        ]));
        return redirect()->route("vehicle.index")->with('success', "Updated");
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->back()->with('success', "Removed");
    }
}
