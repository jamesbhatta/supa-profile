<?php

namespace App\Http\Controllers;

use App\TouristArea;
use Illuminate\Http\Request;

class TouristAreaController extends Controller
{
    public function displayData()
    {
        $info=TouristArea::get();
       
        return response()->json($info, 200);
    }
    public function index(TouristArea $touristArea)
    {
        $touristAreas=TouristArea::get();
        return view('currentMinistry.tourist_area.index',compact('touristArea','touristAreas'));
    }

    public function store(Request $request)
    {
        $datas=$request->validate([
            'name'=>'required',
            'address'=>'required',
            'image'=>'nullable',
        ]);
        if ($image = $request->file('image')) {
            // return "hello";
            $imagePath = 'touristArea/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imagePath, $profileImage);
            $datas['image'] = "$profileImage";
           
        }

        TouristArea::create($datas);
        return redirect()->back()->with('success',"Saved");
    }


    public function edit(TouristArea $touristArea)
    {
        $touristAreas=TouristArea::get();
        return view('currentMinistry.tourist_area.index',compact('touristArea','touristAreas'));
    }

    public function update(Request $request, TouristArea $touristArea)
    {
        $datas=$request->validate([
            'name'=>'required',
            'address'=>'required',
            'image'=>'nullable',
        ]);   
        if ($image = $request->file('image')) {
            // return "hello";
            $imagePath = 'touristArea/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imagePath, $profileImage);
            $datas['image'] = "$profileImage";
           
        }
        $touristArea->update($datas);
        return redirect()->route('tourist-area.index')->with('success',"Update successfully");
    }

    public function destroy(TouristArea $touristArea)
    {
        $touristArea->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
