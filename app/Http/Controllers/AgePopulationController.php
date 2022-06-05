<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\AgePopulation;
class AgePopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts=District::all();
        $population=AgePopulation::with('districts')->get();
        return view('populations.age_population.index',compact(['districts','population']));
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
            'age_group'=>'required',
            'male_num'=>'required',
            'female_num'=>'required'
        ]);
        if(AgePopulation::where('district_id', $request->district_id)->where('age_group',$request->age_group)->exists()){
            return redirect()->back()->with('success','विवरण पहिले नै अवस्थित छ');
        }else{
            AgePopulation::create($request->all());
            return redirect()->back()->with('success','उमेर अनुसारको जनसंख्या सफलतापूर्वक थपियो');
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
        $districts=District::all();
        $population=AgePopulation::with('districts')->where('id',$id)->get();
        // return $population;
        return view('populations.age_population.edit',compact(['districts','population']));
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
            'age_group'=>'required',
            'male_num'=>'required',
            'female_num'=>'required'
        ]);

        AgePopulation::find($id)->update($request->all());
        return redirect()->route('age-population.index')->with('success','उमेर अनुसारको जनसंख्या विवरण सफलता पुर्बक अपडेट भयो');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AgePopulation::find($id)->delete();
        return redirect()->back()->with('success','उमेर अनुसारको जनसंख्या विवरण सफलता पुर्बक हटाइयो');
    }
}
