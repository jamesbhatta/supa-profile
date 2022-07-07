<?php

namespace App\Http\Controllers;

use App\District;
use App\ProudProject;
use App\Province;
use Illuminate\Http\Request;

class ProudProjectController extends Controller
{
    public function listingProudProject()
    {
        $data = ProudProject::get();
        $dataset['labels'] = ["क्र.स.", "सडक", "जिल्ला", "ठेक्का लागेको लम्बाइ", "रकम (रु.लाखमा)", "सम्पन्न हुने अवधि"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->road,
                $item->district,
                $item->lenght,
                $item->price,
                $item->finishing_date
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(ProudProject $proudProject)
    {
        $proudProjects=ProudProject::all();
        $districts=District::all();
        $provinces=Province::all();
        return view('infrastructureDevelopment.proudProject.index',compact(['districts','provinces','proudProjects','proudProject']));
    }
    public function store(Request $request)
    {
        ProudProject::create($request->validate([
            'road'=>"required",
            'district'=>"required",
            'lenght'=>"required",
            'price'=>"required",
            'finishing_date'=>"required|date",
        ]));
        return redirect()->back()->with('success',"प्रदेश गौरबका आयोजन सफलतापूर्वक थपियो");
    }
    public function destroy(ProudProject $proudProject)
    {
        $proudProject->delete();
        return redirect()->back()->with('success','रदेश गौरबका आयोजन सफलतापूर्वक हटाइयो');
    }
    public function edit(ProudProject $proudProject)
    {
        $proudProjects=ProudProject::all();
        $districts=District::all();
        $provinces=Province::all();
        return view('infrastructureDevelopment.proudProject.index',compact(['districts','provinces','proudProjects','proudProject']));
    }
    public function update(Request $request, ProudProject $proudProject)
    {
        $proudProject->update($request->validate([
            'road'=>"required",
            'district'=>"required",
            'lenght'=>"required",
            'price'=>"required",
            'finishing_date'=>"required|date",
        ]));
        return redirect()->route('proud-project.index')->with('success',"रदेश गौरबका आयोजन सफलतापूर्वक परिवर्तन भयो");
    }
}
