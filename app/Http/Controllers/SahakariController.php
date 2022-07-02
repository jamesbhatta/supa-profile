<?php

namespace App\Http\Controllers;

use App\District;
use App\Sahakari;
use Illuminate\Http\Request;

class SahakariController extends Controller
{

    public function listing()
    {
        $data = Sahakari::get();
        $dataset['labels'] = ["क्र.स.", "बेरोजगारी", "बहुउद्देश्यीय", "कृषि", "ऋण तथा बचत", "स्वास्थ्य", "सञ्चार", "विधुत", "जडिबुटी", "वतावरण संरक्षण", "प्रकाशन", "अन्य", "जम्मा"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $key + 1,
                $item->district,
                $item->bahu_udesye,
                $item->agriculture,
                $item->loan,
                $item->helth,
                $item->tele_comunication,
                $item->electricity,
                $item->jadibuti,
                $item->batabaran,
                $item->prakasan,
                $item->other,
                $item->bahu_udesye + $item->agriculture + $item->loan + $item->helth + $item->tele_comunication + $item->electricity + $item->jadibuti + $item->batabaran + $item->prakasan + $item->other

            ];
        }

        return response()->json($dataset, 200);
    }

    public function index(Sahakari $sahakari)
    {
        $sahakaris = Sahakari::get();
        $districts = District::get();
        return view('economicCondition.cooperative.index', compact(['sahakari', 'sahakaris', 'districts']));
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'district' => "required"
        ]);
        Sahakari::create($request->all());
        return redirect()->back()->with('success', "Saved");
    }

    public function edit(Sahakari $sahakari)
    {
        $sahakaris = Sahakari::get();
        $districts = District::get();
        return view('economicCondition.cooperative.index', compact(['sahakari', 'sahakaris', 'districts']));
    }

    public function update(Request $request, Sahakari $sahakari)
    {
        $request->validate([
            'district' => "required"
        ]);
        $sahakari->update($request->all());

        return redirect()->route("sahakari.index")->with('success', "Updated");
    }

    public function destroy(Sahakari $sahakari)
    {
        $sahakari->delete();
        return redirect()->back()->with('success', "removed");
    }
}
