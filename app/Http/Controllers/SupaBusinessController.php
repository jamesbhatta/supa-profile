<?php

namespace App\Http\Controllers;

use App\SupaBusiness;
use Illuminate\Http\Request;

class SupaBusinessController extends Controller
{
    public function listingSupaBusiness()
    {
        $data = SupaBusiness::get();
        $dataset['labels'] = ["क्र.स.","वर्गिकरण", "संख्या", "कुलपुँजी", "संख्या", "कुलपुँजी", "संख्या", "कुलपुँजी", "संख्या", "कुलपुँजी"];
        $dataset['data'] = [];
        foreach ($data as $key => $item) {
            $dataset['data'][] = [
                $item->$key+1,
                $item->type,
                $item->laghu_quantity,
                $item->laghu_capital,
                $item->gahrelu_quantity,
                $item->gharelu_capital,
                $item->sana_quantity,
                $item->sana_capital,
                $item->laghu_quantity+$item->gahrelu_quantity+$item->sana_quantity,
                $item->laghu_capital+$item->gharelu_capital+$item->sana_capital,
            ];
        }

        return response()->json($dataset, 200);
    }
    public function index(SupaBusiness $supaBusiness)
    {
        $supaBusinesses=SupaBusiness::get();
        return view('business.supaBusiness.index',compact(['supaBusiness','supaBusinesses']));
    }   

    public function store(Request $request)
    {
        SupaBusiness::create($request->validate([
            'type'=>"required",
            'laghu_quantity'=>"required",
            'laghu_capital'=>"required",
            'gahrelu_quantity'=>"required",
            'gharelu_capital'=>"required",
            'sana_quantity'=>"required",
            'sana_capital'=>"required",
        ]));
        return redirect()->back()->with('success',"कूल साना उद्योग सफलतापूर्वक थपियो");
    }
    public function destroy(SupaBusiness $supaBusiness)
    {
        $supaBusiness->delete();
        return redirect()->back()->with('success',"कूल साना उद्योग सफलतापूर्वक हटाइयो");
    }
    public function edit(SupaBusiness $supaBusiness)
    {
        $supaBusinesses=SupaBusiness::get();
        return view('business.supaBusiness.index',compact(['supaBusiness','supaBusinesses']));
    }   
    public function update(Request $request,SupaBusiness $supaBusiness)
    {
        $supaBusiness->update($request->validate([
            'type'=>"required",
            'laghu_quantity'=>"required",
            'laghu_capital'=>"required",
            'gahrelu_quantity'=>"required",
            'gharelu_capital'=>"required",
            'sana_quantity'=>"required",
            'sana_capital'=>"required", 
        ]));
        return redirect()->route("supa-business.index")->with('success',"कूल साना उद्योग सफलतापूर्वक परिवर्तन भयो");
    }
    
}
