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
        $municipalities = Municipality::all();
        $municipalities_area = MunicipalityArea::with('municipalities')->get();
        $provinces = Province::with('districts')->get();
        $municipality = new Municipality();
        // return $municipality;
        return view('area-of-municipality.index', compact(['municipalities','municipalities_area','municipality','provinces']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        // return $request->municipalitiy_id;
        $request->validate([
            'muncipality_area'=>'required',
            'ward_count'=>'required',
            'municipalitiy_id'=>'required'
        ]);
        if(MunicipalityArea::where('municipalitiy_id',$request->municipalitiy_id)){
            return redirect()->back()->with('error', 'न.पा./गा.वि.स. पहिले नै सम्मिलित छ');
        }else{
            MunicipalityArea::create($request->all());

            return redirect()->back()->with('success', 'न.पा./गा.वि.स. सफलतापूर्वक थपियो');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $municipalities = Municipality::all();
        // return $municipalities;
        $municipalities_area = MunicipalityArea::with('municipalities')->where('id',$id)->get();
        // return $municipalities_area;
        $provinces = Province::with('districts')->get();
        $municipality = new Municipality();
        // return $municipality;
        return view('area-of-municipality.edit', compact(['municipalities','municipalities_area','municipality','provinces']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'district_name'=>'required|max:50|min:5',
            'municipalitiy_id'=>'required',
            'muncipality_area'=>'required',
            'ward_count'=>'required'
        ]);
        if(MunicipalityArea::where('municipalitiy_id',$request->municipalitiy_id)){
            return redirect()->back()->with('error', 'न.पा./गा.वि.स. पहिले नै सम्मिलित छ');
        }
        MunicipalityArea::find($id)->update($request->all());
        
        return redirect()->back()->with('success', 'न.पा./गा.वि.स. सफलतापूर्वक अपडेट भयो ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $municipality=MunicipalityArea::find($id);
        $municipality->delete();
        return redirect()->route('area.index')->with('success', 'न.पा./गा.वि.स. हटाइएको छ');
    }
}
