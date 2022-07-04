<?php

namespace App\Http\Controllers;

use App\StateAssemblyMembers;
use Illuminate\Http\Request;

class StateAssemblyMembersController extends Controller
{
    public function listingStateAssemblyMember()
    {
        $data = StateAssemblyMembers::get();
        $dataset['labels'] = ["क्र.स.", "नाम थर", "निर्वाचन क्षेत्र", "हालको राजनीतिक दल"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->name,
                $item->constituency,
                $item->political_parties
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(StateAssemblyMembers $assemblyMember)
    {
        $assemplyMembers=StateAssemblyMembers::all();
        return view('assembly_member.index',compact(['assemplyMembers','assemblyMember']));
    }
    public function store(Request $request)
    {
        StateAssemblyMembers::create($request->validate([
            'name'=>"required|min:3",
            'constituency'=>"required|min:5",
            'political_parties'=>"required|min:5",
        ]));
        return redirect()->back()->with('success',"प्रदेश सभा सदस्यहरुको नामावली सफलतापूर्वक थपियो");
    }

    public function destroy(StateAssemblyMembers $assemblyMember)
    {
        $assemblyMember->delete();
        return redirect()->back()->with('success','प्रदेश सभा सदस्यहरुको नामावली सफलतापूर्वक हटाइयो');
    }

    public function edit(StateAssemblyMembers $assemblyMember)
    {
        $assemplyMembers=StateAssemblyMembers::all();
        return view('assembly_member.index',compact(['assemplyMembers','assemblyMember']));
    }
    public function update(Request $request,StateAssemblyMembers $assemblyMember)
    {
        $assemblyMember->update($request->validate([
            'name'=>"required|min:3",
            'constituency'=>"required|min:5",
            'political_parties'=>"required|min:5",
        ]));
        return redirect()->route('assembly-member.index')->with('success',"प्रदेश सभा सदस्यहरुको नामावली सफलतापूर्वक परिवर्तन भयो");
    }
}
