<?php

namespace App\Http\Controllers;

use App\Telecomunication;
use Illuminate\Http\Request;

class TelecomunicationController extends Controller
{
    public function listingTelecomunication()
    {
        $data = Telecomunication::get();
        $dataset['labels'] = ["विवरण", $data[0]->date_from ."सम्म",$data[0]->date_to."सम्म"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                
                $item->detail,
                $item->users_from,
                $item->users_to,
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(Telecomunication $telecomunication)
    {
        $telecomunications=Telecomunication::get();
        return view('infrastructureDevelopment.telecommunicationUser.index',compact(['telecomunication','telecomunications']));
    }

    public function store(Request $request)
    {
        Telecomunication::create($request->validate([
            'detail'=>"required",
            'date_from'=>"required",
            'date_to'=>"required",
            'users_from'=>"required",
            'users_to'=>"required",
        ]));
        return redirect()->back()->with('success',"सञ्चार सेवा उपभोगकर्ता सफलतापूर्वक थपियो");
    }

    public function destroy(Telecomunication $telecomunication)
    {
        $telecomunication->delete();
        return redirect()->back()->with('success',"सञ्चार सेवा उपभोगकर्ता सफलतापूर्वक हटाइयो");
    }

    public function edit(Telecomunication $telecomunication)
    {
        $telecomunications=Telecomunication::get();
        return view('infrastructureDevelopment.telecommunicationUser.index',compact(['telecomunication','telecomunications']));
    }

    public function update(Request $request, Telecomunication $telecomunication)
    {
        $telecomunication->update($request->validate([
            'detail'=>"required",
            'date_from'=>"required",
            'date_to'=>"required",
            'users_from'=>"required",
            'users_to'=>"required",
        ]));
        return redirect()->route("telecomunication.index")->with('success',"सञ्चार सेवा उपभोगकर्ता सफलतापूर्वक परिवर्तन भयो");
    }
}
