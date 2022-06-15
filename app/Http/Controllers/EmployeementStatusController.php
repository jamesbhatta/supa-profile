<?php

namespace App\Http\Controllers;

use App\EmployeementStatus;
use App\Province;
use Illuminate\Http\Request;

class EmployeementStatusController extends Controller
{
    public function index(EmployeementStatus $employeementStatus)
    {
        $employeementStatuss=EmployeementStatus::all();
        $province=Province::all();
        return view('economicCondition.employeementStatus.index',compact(['employeementStatuss','employeementStatus','province']));
    }
    public function store(Request $request)
    {
        EmployeementStatus::create($request->validate([
            'province'=>"required",
            'unemployeement'=>"required",
            'unemployeement_ratio'=>"required",
            'labour_force_rate'=>"required",
        ]));
        return redirect()->back()->with('success',"Add");
    }
    public function destroy(EmployeementStatus $employeementStatus)
    {
        $employeementStatus->delete();
        return redirect()->back()->with('success',"Delete");
    }
    public function edit(EmployeementStatus $employeementStatus)
    {
        $employeementStatuss=EmployeementStatus::all();
        $province=Province::all();
        return view('economicCondition.employeementStatus.index',compact(['employeementStatuss','employeementStatus','province']));
    }

    public function update(Request $request, EmployeementStatus $employeementStatus)
    {
        $employeementStatus->update($request->validate([
            'province'=>"required",
            'unemployeement'=>"required",
            'unemployeement_ratio'=>"required",
            'labour_force_rate'=>"required",
        ]));
        return redirect()->route('employeement-status.index')->with('success',"Updated");
    }
}
