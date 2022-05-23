<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewOrganizationNameCheckRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('organization.create');
        }
        if (!$request->has('org_name')) {
            return view('frontend.check-organization-name');
        }
        return view('frontend.index');
    }

    public function checkOrganizationName(NewOrganizationNameCheckRequest $request)
    {
        // name match checked in request
        return redirect()->route('organization.new', ['org_name' => $request->org_name]);
    }
}
