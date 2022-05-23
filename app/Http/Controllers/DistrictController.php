<?php

namespace App\Http\Controllers;

use App\District;
use App\Http\Requests\DistrictRequest;
use App\Province;

class DistrictController extends Controller
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
        $districts = District::all();
        $district = new District();
        $provinces = Province::all();
        return view('district.index', compact('districts', 'district', 'provinces'));
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
    public function store(DistrictRequest $request)
    {
        District::create($request->all());

        return redirect()->back()->with('success', 'जिल्ला सफलतापूर्वक थपियो');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        $districts = District::all();
        $provinces = Province::all();
        return view('district.index', compact('districts', 'district', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(DistrictRequest $request, District $district)
    {
        $district->update($request->all());

        return redirect()->route('district.index')->with('success', 'जिल्ला सफलतापूर्वक अपडेट गरिएको छ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        if ($district->organizations()->exists()) {
            return redirect()->route('district.index')->with('error', 'हटाउँदा त्रुटि। व्यवसायहरू यस क्षेत्रमा अवस्थित छन्।');
        }

        $district->delete();
        return redirect()->route('district.index')->with('success', 'जिल्ला हटाइएको छ');
    }
}
