<?php

namespace App\Http\Controllers;

use App\Province;
use App\ProvinceBusinessl;
use Illuminate\Http\Request;

class ProvinceBusinesslController extends Controller
{
    public function listingProvinceBusinessl()
    {
        $data = ProvinceBusinessl::get();
        $dataset['labels'] = ["प्रदेश", "कृषि र वन", "निर्माण", "उर्जा", "सञ्चार", "उत्पादनमा आधारित", "खानी", "सेवा", "पर्यटन", "उद्योगका संख्या", "कूल लगानी (रु.दश लाखमा)", "रोजगारी"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                
                $item->province,
                $item->agriculture,
                $item->construction,
                $item->energy,
                $item->communication,
                $item->production,
                $item->mine,
                $item->service,
                $item->tourism,
                $item->business,
                $item->investment,
                $item->employeement
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(ProvinceBusinessl $provinceBusiness)
    {
        $provinceBusinesses=ProvinceBusinessl::get();
        $provinces=Province::get();
        return view('business.provinceBusiness.index',compact(['provinceBusinesses','provinceBusiness','provinces']));
    }

    public function store(Request $request)
    {
        ProvinceBusinessl::create($request->validate([
            'province'=>"required",
            'agriculture'=>"required",
            'construction'=>"required",
            'energy'=>"required",
            'communication'=>"required",
            'production'=>"required",
            'mine'=>"required",
            'service'=>"required",
            'tourism'=>"required",
            'business'=>"required",
            'investment'=>"required",
            'employeement'=>"required",
        ]));
        return redirect()->back()->with('success',"ठूला तथा मझौला उद्योग सफलतापूर्वक थपियो");
    }
    public function destroy(ProvinceBusinessl $provinceBusiness)
    {
        $provinceBusiness->delete();
        return redirect()->back()->with('success',"ठूला तथा मझौला उद्योग सफलतापूर्वक हटाइयो");
    }

    public function edit(ProvinceBusinessl $provinceBusiness)
    {
        $provinceBusinesses=ProvinceBusinessl::get();
        $provinces=Province::get();
        return view('business.provinceBusiness.index',compact(['provinceBusinesses','provinceBusiness','provinces']));
    }

    public function update(Request $request, ProvinceBusinessl $provinceBusiness)
    {
        $provinceBusiness->update($request->validate([
            'province'=>"required",
            'agriculture'=>"required",
            'construction'=>"required",
            'energy'=>"required",
            'communication'=>"required",
            'production'=>"required",
            'mine'=>"required",
            'service'=>"required",
            'tourism'=>"required",
            'business'=>"required",
            'investment'=>"required",
            'employeement'=>"required", 
        ]));
        return redirect()->route("province-business.index")->with('success',"ठूला तथा मझौला उद्योग सफलतापूर्वक परिवर्तन भयो");
    }
}
