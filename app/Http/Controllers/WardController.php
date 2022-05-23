<?php

namespace App\Http\Controllers;

use App\Http\Requests\WardRequest;
use App\Ward;

class WardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:super-admin|admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wards = Ward::all('id', 'name', 'name_en');
        $ward = new Ward();
        return view('ward.index', compact(['wards', 'ward']));
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
    public function store(WardRequest $request)
    {
        Ward::create($request->all());

        return redirect()->back()->with('success', 'वडा थप गर्न सफल');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function show(Ward $ward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function edit(Ward $ward)
    {
        $wards = Ward::all('id', 'name', 'name_en');
        return view('ward.index', compact(['wards', 'ward']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function update(WardRequest $request, Ward $ward)
    {
        $ward->update($request->all());

        return redirect()->route('ward.index')->with('success', 'वडा सफलतापूर्वक अपडेट गरिएको छ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ward $ward)
    {
        if ($ward->organizations()->exists()) {
            return redirect()->route('ward.index')->with('error', 'हटाउँदा त्रुटि। व्यवसायहरू यस क्षेत्रमा अवस्थित छन्।');
        }

        $ward->delete();
        return redirect()->route('ward.index')->with('success', 'वडा हटाइएको छ');
    }
}
