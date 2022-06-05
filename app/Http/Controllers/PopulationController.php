<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Municipality;
use App\Population;
class PopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts=District::all();
        $municipalities=Municipality::all();
        $population=Population::with('districts')->with('municipalities')->get();
        
        return view('populations.2078_population.index',compact('districts','municipalities','population'));
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
        $data= Population::all()->where('municipality_id',$request->municipality_id);
       
       
        $request->validate([
            'district_id'=>'required',
            'municipality_id'=>'required',
            'family_num'=>'required',
            'male_num'=>'required',
            'female_num'=>'required'
        ]);
       
        if (Population::where('municipality_id', $request->municipality_id )->exists()) {
            return redirect()->back()->with('error','ना.पा/गा.पा पहिले नै अवस्थित छ');
        }else{
            Population::create($request->all());
            return redirect()->back()->with('success','स्थानिय तहको जनसंख्या सफलतापूर्वक थपियो');
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
        $municipalities=Municipality::all();
        $population=Population::with('districts')->with('municipalities')->get();
        
        return view('populations.2078_population.edit',compact('districts','municipalities','population'));
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
            'family_num'=>'required',
            'male_num'=>'required',
            'female_num'=>'required'
        ]);
        if (Population::where('municipality_id', $request->municipality_id )->where('district_id','!=',$request->district_id)->exists()) {
            return redirect()->route('population.index')->with('error','ना.पा/गा.पा पहिले नै अवस्थित छ');
          
        }else{
            Population::find($id)->update($request->all());
            return redirect()->route('population.index')->with('success','स्थानिय तह को जनसंख्या विवरण सफलता पुर्बक अपडेट भयो');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Population::find($id)->delete();
        return redirect()->back()->with('success','स्थानिय तह को जनसंख्या विवरण सफलता पुर्बक हटाइयो');
    }
}
