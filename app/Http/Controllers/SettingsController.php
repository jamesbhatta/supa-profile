<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!auth()->user()->hasAnyRole(['super-admin', 'admin'])) {
            abort(403, 'You are not authorized to this resource');
        }
        $title = 'सेटिङ्हरू';
        $provinces = \App\Province::all(['id', 'name', 'name_en']);
        $districts = \App\District::all(['id', 'name', 'name_en', 'province_id']);
        $municipalities = \App\Municipality::all(['id', 'name', 'name_en', 'district_id']);
        $settings = collect(settings()->all());

        return view('settings.index', compact([
            'provinces',
            'districts',
            'municipalities',
            'settings',
            'title'
        ]));
    }

    public function sync(Request $request)
    {
        if (!auth()->user()->hasAnyRole(['super-admin', 'admin'])) {
            abort(403, 'You are not authorized to this resource');
        }

        $request->validate([
            // 'app_name' => 'required'
        ]);

        settings()->set($request->except('_token'));
        return redirect()->back()->with('success', 'Settings have been saved');
    }
}
