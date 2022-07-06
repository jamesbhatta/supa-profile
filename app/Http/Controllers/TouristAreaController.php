<?php

namespace App\Http\Controllers;

use App\Http\Resources\TouristAreaResource;
use App\TouristArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TouristAreaController extends Controller
{
    public function displayData()
    {
        $data = TouristArea::get();

        return TouristAreaResource::collection($data);
    }

    public function index(TouristArea $touristArea)
    {
        $touristAreas = TouristArea::get();
        return view('currentMinistry.tourist_area.index', compact('touristArea', 'touristAreas'));
    }

    public function store(Request $request)
    {
        $datas = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'image' => 'required',
        ]);
        // if ($image = $request->file('image')) {
        //     // return "hello";
        //     $imagePath = 'touristArea/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($imagePath, $profileImage);
        //     $datas['image'] = "$profileImage";
        // }

        if ($request->hasFile('image')) {
            $datas['image'] = $request->file('image')->store('tourist-areas');
        }


        TouristArea::create($datas);
        return redirect()->back()->with('success', "Saved");
    }


    public function edit(TouristArea $touristArea)
    {
        $touristAreas = TouristArea::get();
        return view('currentMinistry.tourist_area.index', compact('touristArea', 'touristAreas'));
    }

    public function update(Request $request, TouristArea $touristArea)
    {
        $datas = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'image' => 'nullable',
        ]);
        // if ($image = $request->file('image')) {
        //     // return "hello";
        //     $imagePath = 'touristArea/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($imagePath, $profileImage);
        //     $datas['image'] = "$profileImage";
        // }

        if ($request->hasFile('image')) {
            Storage::delete($touristArea->image);
            $datas['image'] = $request->file('image')->store('tourist-areas');
        }

        $touristArea->update($datas);
        return redirect()->route('tourist-area.index')->with('success', "Update successfully");
    }

    public function destroy(TouristArea $touristArea)
    {
        // delete any files belonging to model
        Storage::delete($touristArea->image);

        $touristArea->delete();
        return redirect()->back()->with('success', "Removed");
    }
}
