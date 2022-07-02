<?php

namespace App\Http\Controllers;

use App\HelthFlow;
use Illuminate\Http\Request;

class HelthFlowController extends Controller
{
    public function listing()
    {
        $data = HelthFlow::get();
        $dataset['labels'] = ["सूचक","२०७४/७५","२०७५/७६","२०७४/७५","२०७५/७६"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                // $key + 1,
                $item->detail,
                $item->national_from,
                $item->national_to,
                $item->provincinal_from,
                $item->provincinal_to,
             
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(HelthFlow $helthFlow)
    {
        $helthFlows=HelthFlow::get();
        return view('socialStatus.health_flow.index',compact(['helthFlow','helthFlows']));
    }

    public function store(Request $request)
    {
        HelthFlow::create($request->validate([
            'detail'=>"required",
            'national_from'=>"required",
            'national_to'=>"required",
            'provincinal_from'=>"required",
            'provincinal_to'=>"required",
        ]));
        return redirect()->back()->with('success',"saved");
    }

    public function edit(HelthFlow $helthFlow)
    {
        $helthFlows=HelthFlow::get();
        return view('socialStatus.health_flow.index',compact(['helthFlow','helthFlows']));
    }

    public function update(Request $request, HelthFlow $helthFlow)
    {
        $helthFlow->update($request->validate([
            'detail'=>"required",
            'national_from'=>"required",
            'national_to'=>"required",
            'provincinal_from'=>"required",
            'provincinal_to'=>"required",
        ]));
        return redirect()->route("helth-flow.index")->with('success',"Updated");
    }

    public function destroy(HelthFlow $helthFlow)
    {
        $helthFlow->delete();
        return redirect()->back()->with('success',"Removed");
    }

}
