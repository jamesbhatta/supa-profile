<?php

namespace App\Http\Controllers;

use App\District;
use App\ProudProject;
use App\Province;
use Illuminate\Http\Request;

class ProudProjectController extends Controller
{
    public function index(ProudProject $proudProject)
    {
        $proudProjects=ProudProject::all();
        $districts=District::all();
        $provinces=Province::all();
        return view('infrastructureDevelopment.proudProject.index',compact(['districts','provinces','proudProjects','proudProject']));
    }
    public function store(Request $request)
    {
        ProudProject::create($request->validate([
            'road'=>"required",
            'district'=>"required",
            'lenght'=>"required",
            'price'=>"required",
            'finishing_date'=>"required",
        ]));
        return redirect()->back()->with('success',"Saved");
    }
    public function destroy(ProudProject $proudProject)
    {
        $proudProject->delete();
        return redirect()->back()->with('success','Deleted');
    }
    public function edit(ProudProject $proudProject)
    {
        $proudProjects=ProudProject::all();
        $districts=District::all();
        $provinces=Province::all();
        return view('infrastructureDevelopment.proudProject.index',compact(['districts','provinces','proudProjects','proudProject']));
    }
    public function update(Request $request, ProudProject $proudProject)
    {
        $proudProject->update($request->validate([
            'road'=>"required",
            'district'=>"required",
            'lenght'=>"required",
            'price'=>"required",
            'finishing_date'=>"required",
        ]));
        return redirect()->route('proud-project.index')->with('success',"Updated");
    }
}
