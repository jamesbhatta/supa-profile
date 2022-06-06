<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DisabilityDetail;
use App\Province;
use App\BankDetail;
class BankDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::with('districts')->get();
        $bank_details=BankDetail::with('districts')->get();
        // return $bank_details;
        return view('bank.bankDetail',compact('provinces','bank_details'));
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
            'bank_type'=>'required',
            'bank_number'=>'required'
        ]);
        if(BankDetail::where('district_id',$request->district_id)->where('bank_type',$request->bank_type)->exists()){
            return redirect()->back()->with('error','बैंक तथा वित्तिय संस्था विवरण पहिले नै अवस्थित छ');
        }else{
            BankDetail::create($request->all());
            return redirect()->back()->with('success','बैंक तथा वित्तिय संस्था विवरण सफलतापूर्वक थपियो');
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
        $provinces = Province::with('districts')->get();
        $bank_details=BankDetail::with('districts')->where('id',$id)->get();
        // return $bank_details;
        return view('bank.edit',compact('provinces','bank_details'));
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
            'bank_type'=>'required',
            'bank_number'=>'required'
        ]);
        BankDetail::find($id)->update($request->all());
        return redirect()->route('bank-detail.index')->with('success','बैंक तथा वित्तिय संस्था विवरण सफलता पुर्बक अपडेट भयो');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BankDetail::find($id)->delete();
        return redirect()->back()->with('success','बैंक तथा वित्तिय संस्था विवरण सफलता पुर्बक हटाइयो');
    }
}
