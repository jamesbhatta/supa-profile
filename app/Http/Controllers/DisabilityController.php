<?php

namespace App\Http\Controllers;
use App\Disability;
use Illuminate\Http\Request;
class DisabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disability=Disability::all();

        $disabilities=new Disability();
        // return $disabilities;
        return view('disability.index',compact(['disability','disabilities']));
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
            'disability'=>'required'
        ]);
        Disability::create($request->all());
        return redirect()->back()->with('success','अपाङ्गता प्रकार सफलतापूर्वक थपियो');
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
        $disabilities=Disability::find($id)->get()[0];
        // return $disabilities;
        $disability=Disability::all();
        return view('disability.index',compact(['disability','disabilities']));

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
        
        Disability::find($id)->update($request->all());

        return redirect()->route('disability.index')->with('success','विद्यालय वििरण सफलतापूर्वक अपडेट भयो');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Disability::find($id)->delete();
        return redirect()->back()->with('success','अपाङ्गता सफलता पुर्बक हटाइयो');
    }
}
