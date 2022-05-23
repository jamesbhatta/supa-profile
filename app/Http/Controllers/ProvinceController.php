<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
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
        $provinces = Province::withCount('districts')->get();
        $province = new Province();
        return view('province.index', compact('provinces', 'province'));
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
            'name' => 'required',
            'name_en' => 'required'
        ]);

        Province::create($request->all());

        return redirect()->back()->with('success', 'प्रदेश थप गर्न सफल');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
        $provinces = Province::all();
        return view('province.index', compact('provinces', 'province'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Province $province)
    {
        $request->validate([
            'name' => 'required',
            'name_en' => 'required'
        ]);

        $province->update($request->all());

        return redirect()->route('province.index')->with('success', 'प्रदेश सफलतापूर्वक अपडेट गरिएको छ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        if ($province->organizations()->exists()) {
            return redirect()->route('province.index')->with('error', 'हटाउँदा त्रुटि। व्यवसायहरू यस क्षेत्रमा अवस्थित छन्।');
        }

        $province->delete();
        return redirect()->route('province.index')->with('success', 'प्रदेश सफलतापूर्वक हटाइएको छ');
    }
}
