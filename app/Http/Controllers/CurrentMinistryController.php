<?php

namespace App\Http\Controllers;

use App\CurrentMinistry;
use Illuminate\Http\Request;

class CurrentMinistryController extends Controller
{
    public function index(CurrentMinistry $currentMinistry)
    {
        $currentMinistries=CurrentMinistry::all();
        return view('currentMinistry.index',compact(['currentMinistries','currentMinistry']));
    }
    public function store(Request $request)
    {
        CurrentMinistry::create($request->validate([
            'name'=>"required",
            'post'=>"required",
            'ministry'=>"required",
            'team'=>"required"
        ]));
        return redirect()->back()->with('success',"Added");
    }
    public function destroy(CurrentMinistry $currentMinistry)
    {
        $currentMinistry->delete();
        return redirect()->back()->with('success','deleted');
    }
    public function edit(CurrentMinistry $currentMinistry)
    {
        $currentMinistries=CurrentMinistry::all();
        return view('currentMinistry.index',compact(['currentMinistries','currentMinistry']));
    }
    public function update(Request $request,CurrentMinistry $currentMinistry)
    {
        $data=$request->validate([
            'name'=>"required",
            'post'=>"required",
            'ministry'=>"required",
            'team'=>"required"
        ]);
        $currentMinistry->update($data);
        return redirect()->route('current-ministry.index')->with('success',"Updated");
    }
}
