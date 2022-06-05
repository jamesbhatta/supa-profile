<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Municipality;
use App\LocalPopulation;
class LocalPopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $district=District::all();
        $municipality=Municipality::all();
        $population = LocalPopulation::with('districts')->get();
        $populations= new LocalPopulation;
        
        return view('populations.local_population.index',compact(['district','municipality','population','populations']));
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
            'municipality_name'=>'required',
            'house_number'=>'required',
            'male_number'=>'required',
            'female_number'=>'required',
            'avg_house_number'=>'required',
            'anupat'=>'required',
            'fml_edu_percentage'=>'required',
            'ml_edu_percentage'=>'required'
       ]);

       LocalPopulation::create($request->all());
       return redirect()->back()->with('success', 'स्थानिय तहको जनसंख्या सफलतापूर्वक थपियो');
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
        $populations=LocalPopulation::with('districts')->where('id',$id)->get();
        
        $municipality=Municipality::all();
        $district=District::all();
        $population = LocalPopulation::with('districts')->get();
        return view('populations.local_population.edit',compact(['district','municipality','population','populations']));
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
            'municipality_name'=>'required',
            'house_number'=>'required',
            'male_number'=>'required',
            'female_number'=>'required',
            'avg_house_number'=>'required',
            'anupat'=>'required',
            'fml_edu_percentage'=>'required',
            'ml_edu_percentage'=>'required'
       ]);

       LocalPopulation::find($id)->update($request->all());
       return redirect()->route('local-population.index')
       ->with('success', 'स्थानिय तह को जनसंख्या विवरण सफलता पुर्बक अपडेट भयो ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LocalPopulation::find($id)->delete();
        return redirect()->route('local-population.index')
        ->with('success', 'स्थानिय तह को जनसंख्या विवरण सफलता पुर्बक हटाइयो');
    }
}
