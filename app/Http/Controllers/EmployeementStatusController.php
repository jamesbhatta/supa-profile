<?php

namespace App\Http\Controllers;

use App\EmployeementStatus;
use App\Province;
use Illuminate\Http\Request;

class EmployeementStatusController extends Controller
{
    public function listingEmployeementStatus()
    {
        $data = EmployeementStatus::get();
        $dataset['labels'] = ["प्रदेश", "बेरोजगारी", "जनसंख्याको अनुपातमा बेरोजगारी", "श्रमशक्तिमा सहभागिताको दर"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->province,
                $item->unemployeement,
                $item->unemployeement_ratio,
                $item->labour_force_rate
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(EmployeementStatus $employeementStatus)
    {
        $employeementStatuss = EmployeementStatus::all();
        $province = Province::all();
        return view('economicCondition.employeementStatus.index', compact(['employeementStatuss', 'employeementStatus', 'province']));
    }
    public function store(Request $request)
    {
        EmployeementStatus::create($request->validate([
            'province' => "required",
            'unemployeement' => "required",
            'unemployeement_ratio' => "required",
            'labour_force_rate' => "required",
        ]));
        return redirect()->back()->with('success', "श्रम तथा रोजगारको अवस्था सफलतापूर्वक थपियो");
    }
    public function destroy(EmployeementStatus $employeementStatus)
    {
        $employeementStatus->delete();
        return redirect()->back()->with('success', "श्रम तथा रोजगारको अवस्था सफलतापूर्वक हटाइयो");
    }
    public function edit(EmployeementStatus $employeementStatus)
    {
        $employeementStatuss = EmployeementStatus::all();
        $province = Province::all();
        return view('economicCondition.employeementStatus.index', compact(['employeementStatuss', 'employeementStatus', 'province']));
    }

    public function update(Request $request, EmployeementStatus $employeementStatus)
    {
        $employeementStatus->update($request->validate([
            'province' => "required",
            'unemployeement' => "required",
            'unemployeement_ratio' => "required",
            'labour_force_rate' => "required",
        ]));
        return redirect()->route('employeement-status.index')->with('success', "श्रम तथा रोजगारको अवस्था सफलतापूर्वक परिवर्तन भयो");
    }
}
