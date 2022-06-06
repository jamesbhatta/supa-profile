<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipality;
use App\Province;
use App\Disability;
use App\DisabilityDetail;
class DisabilityDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disability_details= DisabilityDetail::with('disibilities')->with('districts')->get();
        $provinces = Province::with('districts')->get();
        $disability=Disability::all();
        return view('disability.detail.index', compact([ 'provinces','disability','disability_details']));
        // return view();

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
            'disability_id'=>'required',
            'district_id'=>'required',
            'male_num'=>'required',
            'female_num'=>'required'
        ]);

        if(DisabilityDetail::where('district_id',$request->district_id)->where('disability_id',$request->disability_id)->exists()){
            return redirect()->back()->with('error','अपांगताको संख्यात्मक विवरण पहिले नै अवस्थित छ');
        }else{
            DisabilityDetail::create($request->all());
            return redirect()->back()->with('success','अपांगताको संख्यात्मक विवरण सफलतापूर्वक थपियो');
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
        $disability_details= DisabilityDetail::with('disibilities')->with('districts')->where('id',$id)->get();
        $provinces = Province::with('districts')->get();
        $disability=Disability::all();
        return view('disability.detail.edit', compact([ 'provinces','disability','disability_details']));
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
            'disability_id'=>'required',
            'district_id'=>'required',
            'male_num'=>'required',
            'female_num'=>'required'
        ]);

        DisabilityDetail::find($id)->update($request->all());
        return redirect()->route('disability-detail.index')->with('success','अपांगताको संख्यात्मक विवरण सफलतापूर्वक थपियो');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DisabilityDetail::find($id)->delete();
        return redirect()->back()->with('success','अपांगताको संख्यात्मक विवरण सफलतापूर्वक हटाइयो');
    }
}
