<?php

namespace App\Http\Controllers;

use App\CurrentMinistry;
use Illuminate\Http\Request;

class CurrentMinistryController extends Controller
{
    public function listingCurrentMinistry()
    {
        $data = CurrentMinistry::get();
        $dataset['labels'] = ["क्र.स.", "नाम थर", "पद", "मन्त्रालय", "दल"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            
            $dataset['data'][] = [
                $key + 1,

                $item->name,
                $item->post,
                $item->ministry,
                $item->team
            ];
        }
        

        return response()->json($dataset, 200);
    }

    public function index(CurrentMinistry $currentMinistry)
    {
        $currentMinistries = CurrentMinistry::get();
        return view('currentMinistry.index', compact(['currentMinistries', 'currentMinistry']));
    }
    public function store(Request $request)
    {
        $datas=$request->validate([
            'name' => "required|min:3|max:50",
            'post' => "required|min:3|max:50",
            'ministry' => "required|min:10|max:50",
            'team' => "required|min:10|max:50"
        ]);
        if ($image = $request->file('profile')) {
            // return "hello";
            $imagePath = 'ministry/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imagePath, $profileImage);
            $datas['profile'] = "$profileImage";
            CurrentMinistry::create($datas);
        }
        return redirect()->back()->with('success', "हालको मन्त्रिपरिषद् सफलतापूर्वक थपियो");
    }
    public function destroy(CurrentMinistry $currentMinistry)
    {
        $currentMinistry->delete();
        return redirect()->back()->with('success', 'हालको मन्त्रिपरिषद् सफलतापूर्वक हटाइयो');
    }
    public function edit(CurrentMinistry $currentMinistry)
    {
        $currentMinistries = CurrentMinistry::all();
        return view('currentMinistry.index', compact(['currentMinistries', 'currentMinistry']));
    }
    public function update(Request $request, CurrentMinistry $currentMinistry)
    {
        $data = $request->validate([
            'name' => "required|min:3|max:50",
            'post' => "required|min:3|max:50",
            'ministry' => "required|min:10|max:50",
            'team' => "required|min:10|max:50"
        ]);
        $currentMinistry->update($data);
        return redirect()->route('current-ministry.index')->with('success', "हालको मन्त्रिपरिषद् सफलतापूर्वक परिवर्तन भयो");
    }
}
