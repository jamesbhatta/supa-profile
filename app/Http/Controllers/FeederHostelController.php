<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\Municipality;
use App\FeederHostel;
class FeederHostelController extends Controller
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
        $feederhostels=FeederHostel::with('districts')->with('municipalities')->get();
        $fhostels=new FeederHostel;
        // return $feederhostels;
        return view('hostel.index',compact(['provinces','municipalities','feederhostels','fhostels']));
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
            'school_name'=>'required',
            'quota'=>'required',
            'student_number'=>'required'
        ]);

        FeederHostel::create($request->all());
        return redirect()->back()->with('success','फिडर छात्रावासको विवरण सफलतापूर्वक थपियो');
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
        $feederhostels=FeederHostel::with('districts')->with('municipalities')->get();
        $fhostels=FeederHostel::with('districts')->with('municipalities')->where('id',$id)->get()[0];
        
        // $feederhostels= $feederhostels[0];
        // return $fhostels;
        return view('hostel.index',compact(['provinces','municipalities','feederhostels','fhostels']));
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
            'school_name'=>'required',
            'quota'=>'required',
            'student_number'=>'required'
        ]);

        FeederHostel::find($id)->update($request->all());
        return redirect()->back()->with('success','फिडर छात्रावासको विवरण सफलतापूर्वक अपडेट भयो');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FeederHostel::find($id)->delete();
        return redirect()->back()->with('success','फिडर छात्रावासको विवरण सफलतापूर्वक हटाइयो');
    }
}
