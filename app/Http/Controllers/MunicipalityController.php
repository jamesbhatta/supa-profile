<?php

namespace App\Http\Controllers;

use App\Http\Requests\MunicipalityRequest;
use App\Municipality;
use App\Province;

class MunicipalityController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role:super-admin|admin');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipalities = Municipality::all();
        $municipality = new Municipality();
        $provinces = Province::with('districts')->get();

        return view('municipality.index', compact(['municipalities', 'municipality', 'provinces']));
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
    public function store(MunicipalityRequest $request)
    {
        Municipality::create($request->all());

        return redirect()->back()->with('success', 'न.पा./गा.वि.स. सफलतापूर्वक थपियो');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Municipality  $municipality
     * @return \Illuminate\Http\Response
     */
    public function show(Municipality $municipality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Municipality  $municipality
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipality $municipality)
    {
        $municipalities = Municipality::all();
        $provinces = Province::with('districts')->get();

        return view('municipality.index', compact(['municipalities', 'municipality', 'provinces']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Municipality  $municipality
     * @return \Illuminate\Http\Response
     */
    public function update(MunicipalityRequest $request, Municipality $municipality)
    {
        $municipality->update($request->all());

        return redirect()->route('municipality.index')->with('success', 'न.पा./गा.वि.स. सफलतापूर्वक अपडेट गरिएको छ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Municipality  $municipality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipality $municipality)
    {
        // if ($municipality->organizations()->exists()) {
        //     return redirect()->route('municipality.index')->with('error', 'हटाउँदा त्रुटि। व्यवसायहरू यस क्षेत्रमा अवस्थित छन्।');
        // }

        $municipality->delete();
        return redirect()->route('municipality.index')->with('success', 'न.पा./गा.वि.स. हटाइएको छ');
    }
}
