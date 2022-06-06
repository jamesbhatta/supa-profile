<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\GovermentStudent;
class GovermentStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::with('districts')->get();
        $govermentstudent=GovermentStudent::with('districts')->get();
        // return $govermentstudent;
        return view('students.govermentSchool.index',compact(['provinces','govermentstudent']));
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
            'class'=>'required',
            'boys_num'=>'required',
            'girl_num'=>'required'
        ]);
        if(GovermentStudent::where('district_id',$request->district_id)->where('class',$request->class)->exists()){
            return redirect()->back()->with('error','');
        }else{
            GovermentStudent::create($request->all());
            return redirect()->back()->with('success','');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
