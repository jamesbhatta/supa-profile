<?php

namespace App\Http\Controllers;

use App\InfoCard;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Shared\Trend\Trend;

class InfoCardController extends Controller
{
    public function listingApi()
    {
        $infoCards = InfoCard::get();

        return response()->json($infoCards, 200);
    }

    public function index()
    {
    }

    public function create()
    {
        return $this->showForm(new InfoCard());
    }

    public function showForm(InfoCard $infoCard)
    {
        $updateMode = false;
        if ($infoCard->exists) {
            $updateMode = true;
        }
        $infoCards=InfoCard::all();
        $themes = config('constants.info_card_themes');

        return view('infoCards.index',compact('infoCard','updateMode','infoCards'));
    }

    public function store(Request $request)
    {
        // return $request;
        $data=$request->validate([
            'label'=>'required|max:50|min:5',
            'value'=>'required',
            'icon'=>'',
            'card_theme'=>'',
            'position'=>'',
            'link'=>'',
        ]);
           
      
        InfoCard::create($data);

        return redirect()->back()->with('success', 'Card info सफलतापूर्वक थपियो');
    }

    public function destroy(infoCard $infocard)
    {
        $infocard->delete();

        return redirect()->back()->with('success', 'न.पा./गा.वि.स. हटाइएको छ');
    }
    public function edit(infoCard $infocard)
    { 
        return $this->showForm($infocard);
    }
    public function update(Request $request, infoCard $infocard)
    {
        $data=$request->validate([
            'label'=>'required|max:50|min:5',
            'value'=>'required',
            'icon'=>'',
            'card_theme'=>'',
            'position'=>'',
            'link'=>'',
        ]);

     
        $infocard->update($data);
        
        return redirect()->back()->with('success', 'न.पा./गा.वि.स. सफलतापूर्वक अपडेट भयो ');
    }
}
