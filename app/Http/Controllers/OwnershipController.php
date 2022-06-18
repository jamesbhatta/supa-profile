<?php

namespace App\Http\Controllers;

use App\Ownership;
use Illuminate\Http\Request;

class OwnershipController extends Controller
{
    public function index(Ownership $ownership)
    {
        $ownerships=Ownership::get();
        return view('agriculture.ownership.index',compact(['ownerships','ownership']));
    }
    public function store(Request $request)
    {
        Ownership::create($request->validate([
            'ownership_detail'=>"required",
            'family_number'=>"required",
        ]));
        return redirect()->back()->with('success',"भू – स्वामित्वको अवस्था सफलतापूर्वक थपियो");
    }
    public function destroy(Ownership $ownership)
    {
        # code...
        $ownership->delete();
        return redirect()->back()->with('success',"भू – स्वामित्वको अवस्था सफलतापूर्वक हटाइयो");
    }
    public function edit(Ownership $ownership)
    {
        $ownerships=Ownership::get();
        return view('agriculture.ownership.index',compact(['ownerships','ownership']));
    }
    public function update(Request $request, Ownership $ownership)
    {
        # code...
        $ownership->update($request->validate([
            'ownership_detail'=>"required",
            'family_number'=>"required",
        ]));
        return redirect()->route("ownership.index")->with('success',"भू – स्वामित्वको अवस्था सफलतापूर्वक परिवर्तन भयो");
    }
}
