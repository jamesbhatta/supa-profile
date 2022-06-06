<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\Municipality;
use App\Bank;
use App\LocalBank;
class LocalBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $local_banks=LocalBank::with('districts')->with('municipality')->with('banks')->get();
        $provinces = Province::with('districts')->get();
        $municipalities=Municipality::all();
        $banks=Bank::all();
        // return $local_banks;
        return view('bank.local_level_bank.index',compact('provinces','municipalities','banks','local_banks'));
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
            'municipalities_id'=>'required',
            'banks_id'=>'required',
            'bank_number'=>'required'
        ]);

        LocalBank::create($request->all());
        return redirect()->back()->with('success','विवरण सफलता पुर्बक थपियो');
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
        $local_banks=LocalBank::with('districts')->with('municipality')->with('banks')->where('id',$id)->get();
        $provinces = Province::with('districts')->get();
        $municipalities=Municipality::all();
        $banks=Bank::all();
        // return $local_banks;
        return view('bank.local_level_bank.edit',compact('provinces','municipalities','banks','local_banks'));
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
            'municipalities_id'=>'required',
            'banks_id'=>'required',
            'bank_number'=>'required'
        ]);

        LocalBank::find($id)->update($request->all());
        return redirect()->route('local-bank.index')->with('success','विवरण सफलता पुर्बक अपडेट भयो');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LocalBank::find($id)->delete();
        return  redirect()->back()->with('success','विवरण सफलता पुर्बक हटाइयो');   
    }
}
