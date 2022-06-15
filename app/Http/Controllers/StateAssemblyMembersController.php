<?php

namespace App\Http\Controllers;

use App\StateAssemblyMembers;
use Illuminate\Http\Request;

class StateAssemblyMembersController extends Controller
{
    public function index(StateAssemblyMembers $assemblyMember)
    {
        $assemplyMembers=StateAssemblyMembers::all();
        return view('assembly_member.index',compact(['assemplyMembers','assemblyMember']));
    }
    public function store(Request $request)
    {
        StateAssemblyMembers::create($request->validate([
            'name'=>"required",
            'constituency'=>"required",
            'political_parties'=>"required",
        ]));
        return redirect()->back()->with('success',"Added");
    }

    public function destroy(StateAssemblyMembers $assemblyMember)
    {
        $assemblyMember->delete();
        return redirect()->back()->with('success','Deleted');
    }

    public function edit(StateAssemblyMembers $assemblyMember)
    {
        $assemplyMembers=StateAssemblyMembers::all();
        return view('assembly_member.index',compact(['assemplyMembers','assemblyMember']));
    }
    public function update(Request $request,StateAssemblyMembers $assemblyMember)
    {
        $assemblyMember->update($request->validate([
            'name'=>"required",
            'constituency'=>"required",
            'political_parties'=>"required",
        ]));
        return redirect()->route('assembly-member.index')->with('success',"Update successfully");
    }
}
