<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MunicipalityArea;
use App\Municipality;
use App\District;
use App\Province;

class AreaofMunicipalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipalities = Municipality::latest()->get();
        $municipalities_area = MunicipalityArea::with('municipalities')->get();
        $provinces = Province::with('districts')->get();
        
        return view('area-of-municipality.index', compact(['municipalities','municipalities_area', 'provinces']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->showForm(new MunicipalityArea);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MunicipalityArea::create($request->validate([
            'district_name'=>'required|max:50|min:5',
            'municipalitiy_id'=>'required|unique:municipality_areas,municipalitiy_id',
            'muncipality_area'=>'required',
            'ward_count'=>'required'
        ]));

        return redirect()->back()->with('success', 'न.पा./गा.वि.स. सफलतापूर्वक थपियो');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MunicipalityArea $municipalityArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MunicipalityArea $municipalityArea)
    { 
        return $this->showForm($municipalityArea);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MunicipalityArea $municipalityArea)
    {
        $municipalityArea->udpate($request->validate([
            'district_name'=>'required|max:50|min:5',
            'municipalitiy_id'=>'required|unique:municipality_areas,municipalitiy_id,' . $request->municipalitiy_id,
            'muncipality_area'=>'required',
            'ward_count'=>'required'
        ]));
        
        return redirect()->back()->with('success', 'न.पा./गा.वि.स. सफलतापूर्वक अपडेट भयो ');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MunicipalityArea $municipalityArea)
    {
        $municipalityArea->delete();

        return redirect()->route('area.index')->with('success', 'न.पा./गा.वि.स. हटाइएको छ');
    }
    
    private function showForm(MunicipalityArea $municipalityArea)
    {
        $updateMode = false;
    
        if($municipalityArea->exists)
        {
            $updateMode = true;
        }
    
        $municipalities = Municipality::all();
        $provinces = Province::with('districts')->get();
    
        return view('area-of-municipality.form', compact([
            'municipalityArea',
            'updateMode',
            'municipalities',
            // 'municipalities_area',
            'provinces'
        ]));
    }
}
