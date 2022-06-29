<?php

namespace App\Http\Controllers;

use App\Bali;
use Illuminate\Http\Request;

class TelhanController extends Controller
{

    public function listingTelhan()
    {
        $data = Bali::where('type', "telhan")->get();
        $dataset['labels'] = ["क्रस", "बाली", "क्षेत्रफल हे.", "उत्पादन/अनुमानित मे.ट.", "उत्पादकत्व मे.ट.", "क्षेत्रफल", "उत्पादन/अनुमानित मे.ट.", "उत्पादकत्व मे.ट."];
        // $dataset['backgroundColor'] = ["red", "green", "blue"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $item->$item + 1,
                $item->crops,
                $item->area1,
                $item->production1,
                $item->productivity1,
                $item->area2,
                $item->production2,
                $item->productivity2,
            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(Bali $bali)
    {
        $balis = Bali::where('type', "telhan")->get();
        return view('agriculture.telhan.index', compact(['bali', 'balis']));
    }

    public function store(Request $request)
    {
        Bali::create($request->validate([
            'crops' => "required",
            'area1' => "required",
            'production1' => "required",
            'productivity1' => "required",
            'area2' => "required",
            'production2' => "required",
            'productivity2' => "required",
            'type' => "required",
        ]));
        return redirect()->back()->with('success', "Saved");
    }

    public function edit(Bali $bali)
    {
        $balis = Bali::where('type', "telhan")->get();
        return view('agriculture.telhan.index', compact(['bali', 'balis']));
    }

    public function update(Request $request, Bali $bali)
    {
        $bali->update($request->validate([
            'crops' => "required",
            'area1' => "required",
            'production1' => "required",
            'productivity1' => "required",
            'area2' => "required",
            'production2' => "required",
            'productivity2' => "required",
        ]));
        return redirect()->route("telhan.index")->with('success', "Updated");
    }

    public function destroy(Bali $bali)
    {
        $bali->delete();
        return redirect()->back()->with('success', "Removed");
    }
}
