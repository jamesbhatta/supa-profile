<?php

namespace App\Http\Controllers;

use App\PrivinceHead;
use Illuminate\Http\Request;

class PrivinceHeadController extends Controller
{
    public function listingProvinceHead()
    {
        $data = PrivinceHead::get();
        $dataset['labels'] = ["क्र.स.", "प्रदेश प्रमुख", "देखि", "सम्म"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->province_head,
                $item->from,
                $item->to
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(PrivinceHead $provinceHead)
    {
        $provinceheads=PrivinceHead::all();
        return view('province_head.index',compact(['provinceheads','provinceHead']));
    }
    public function store(Request $request)
    {
        PrivinceHead::create($request->validate([
            'province_head'=>"required|min:3",
            'from'=>"required|min:3|max:50|date",
            'to'=>"required|min:3|max:50|date",
        ]));
        return redirect()->back()->with('success',"हालसम्म भएका प्रदेश प्रमुखहरुको नामावली र मिति सफलतापूर्वक थपियो");
    }

    public function destroy(PrivinceHead $provinceHead)
    {
        $provinceHead->delete();
        return redirect()->back()->with('success',"हालसम्म भएका प्रदेश प्रमुखहरुको नामावली र मिति सफलतापूर्वक हटाइयो");
    }
    public function edit(PrivinceHead $provinceHead)
    {
        $provinceheads=PrivinceHead::all();
        return view('province_head.index',compact(['provinceheads','provinceHead']));
    }
    public function update(Request $request, PrivinceHead $provinceHead)
    {
        $provinceHead->update($request->validate([
            'province_head'=>"required|min:3",
            'from'=>"required|min:3|max:50|date",
            'to'=>"required|min:3|max:50|date",
        ]));
        return redirect()->route('province-head.index')->with('success','हालसम्म भएका प्रदेश प्रमुखहरुको नामावली र मिति सफलतापूर्वक परिवर्तन भयो');
    }
}
