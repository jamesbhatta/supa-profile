<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks=Bank::all();
        return view('bank.bank',compact('banks'));
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
            'bank'=>'required'
        ]);
        if(Bank::where('bank',$request->bank)->exists()){
            return redirect()->back()->with('error','बैंक तथा वित्तिय संस्था पहिले नै अवस्थित छ');
        }else{
            Bank::create($request->all());
            return redirect()->back()->with('success','बैंक तथा वित्तिय संस्था सफलतापूर्वक थपियो');  
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
        $banks=Bank::where('id',$id)->get();
        return view('bank.editBank',compact('banks'));
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
            'bank'=>'required'
        ]);
        Bank::find($id)->update($request->all());
        return redirect()->route('bank.index')->with('success','बैंक तथा वित्तिय संस्था सफलतापूर्वक अपडेट भयो');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bank::find($id)->delete();
        return redirect()->back()->with('success','बैंक तथा वित्तिय संस्था सफलतापूर्वक हटाइयो');
    }
}
