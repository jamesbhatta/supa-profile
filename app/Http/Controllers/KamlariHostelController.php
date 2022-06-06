<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\KamlariHostel;
use App\District;
use App\Municipality;
use App\Ward;
class KamlariHostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::with('districts')->get();
        $municipalities=Municipality::all();
        $wards=Ward::all();
        $kamlarihostel=KamlariHostel::with('districts')->with('municipalities')->with('wards')->get();
        // return $kamlarihostel;
        $kamlari=new KamlariHostel;
        return view('hostel.kamlari.index',compact(['provinces','kamlari','municipalities','wards','kamlarihostel']));
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
        $request->validate([
            'district_id'=>'required',
            'municipality_id'=>'required',
            'ward_id'=>'required',
            'school_name'=>'required',
            'student_num'=>'required'
        ]);
        KamlariHostel::create($request->all());
        return redirect()->back()->with('success','मुक्त कमलरी छात्रावास सफलतापूर्वक थपियो');
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
    {
        $provinces = Province::with('districts')->get();
        $municipalities=Municipality::all();
        $wards=Ward::all();
        $kamlarihostel=KamlariHostel::with('districts')->with('municipalities')->with('wards')->get();
        // return $kamlarihostel;
        $kamlari=KamlariHostel::with('districts')->with('municipalities')->with('wards')->where('id',$id)->get()[0];
        return view('hostel.kamlari.index',compact(['provinces','kamlari','municipalities','wards','kamlarihostel']));
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
            'district_id'=>'required',
            'municipality_id'=>'required',
            'ward_id'=>'required',
            'school_name'=>'required',
            'student_num'=>'required'
        ]);
        KamlariHostel::find($id)->update($request->all());
        return redirect()->route('kamlari-hostel.index')->with('success','मुक्त कमलरी छात्रावास विवरण सफलता पुर्बक अपडेट भयो');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KamlariHostel::find($id)->delete();
        return redirect()->back()->with('success','मुक्त कमलरी छात्रावास विवरण सफलता पुर्बक हटाइयो');
    }
}
