<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\School;
class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools= School::with('districts')->get();
        $provinces = Province::with('districts')->get();
        return view('school.index',compact(['provinces','schools']));
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
            'school_type'=>'required',
            'school_level'=>'required',
            'school_number'=>'required',
        ]);
        if(School::where('district_id',$request->district_id)->where('school_type',$request->school_type)->where('school_level',$request->school_level)->exists()){
            return redirect()->back()->with('error','विद्यालय वििरण पहिले नै अवस्थित छ');
        }else{
            School::create($request->all());
            return redirect()->back()->with('success','विद्यालय वििरण सफलतापूर्वक थपियो');
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
    {
        $schools= School::with('districts')->where('id',$id)->get();
        $provinces = Province::with('districts')->get();
        return view('school.edit',compact(['provinces','schools']));
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
            'school_type'=>'required',
            'school_level'=>'required',
            'school_number'=>'required',
        ]);
        School::find($id)->update($request->all());
        return redirect()->route('school.index')->with('success','विद्यालय वििरण सफलतापूर्वक अपडेट भयो');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        School::find($id)->delete();
        return redirect()->back()->with('success','विद्यालय वििरण सफलतापूर्वक हटाइयो');
    }
}
