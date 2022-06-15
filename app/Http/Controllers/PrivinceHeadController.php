<?php

namespace App\Http\Controllers;

use App\PrivinceHead;
use Illuminate\Http\Request;

class PrivinceHeadController extends Controller
{
    public function index(PrivinceHead $provinceHead)
    {
        $provinceheads=PrivinceHead::all();
        return view('province_head.index',compact(['provinceheads','provinceHead']));
    }
    public function store(Request $request)
    {
        PrivinceHead::create($request->validate([
            'province_head'=>"required",
            'from'=>"required",
            'to'=>"required",
        ]));
        return redirect()->back()->with('success',"added");
    }

    public function destroy(PrivinceHead $provinceHead)
    {
        $provinceHead->delete();
        return redirect()->back()->with('success',"deleted");
    }
    public function edit(PrivinceHead $provinceHead)
    {
        $provinceheads=PrivinceHead::all();
        return view('province_head.index',compact(['provinceheads','provinceHead']));
    }
    public function update(Request $request, PrivinceHead $provinceHead)
    {
        $provinceHead->update($request->validate([
            'province_head'=>"required",
            'from'=>"required",
            'to'=>"required",
        ]));
        return redirect()->route('province-head.index')->with('success','Updated');
    }
}
