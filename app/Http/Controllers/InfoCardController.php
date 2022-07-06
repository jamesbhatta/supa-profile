<?php

namespace App\Http\Controllers;

use App\InfoCard;
use Illuminate\Http\Request;

class InfoCardController extends Controller
{
    public function listingApi()
    {
        $infoCards = InfoCard::positioned()->get();

        return response()->json($infoCards, 200);
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
        $infoCards = InfoCard::positioned()->get();
        $themes = config('constants.info_card_themes');

        return view('infoCards.index', compact('infoCard', 'updateMode', 'infoCards', 'themes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'label' => 'required',
            'value' => 'required',
            'icon' => 'nullable',
            'card_theme' => 'nullable',
            'position' => 'nullable',
            'link' => 'nullable',
        ]);

        InfoCard::create($data);

        return redirect()->back()->with('success', 'Card info सफलतापूर्वक थपियो');
    }
    
    public function edit(InfoCard $infocard)
    {
        return $this->showForm($infocard);
    }
    
    public function update(Request $request, InfoCard $infocard)
    {
        $data = $request->validate([
            'label' => 'required',
            'value' => 'required',
            'icon' => 'nullable',
            'card_theme' => 'nullable',
            'position' => 'nullable',
            'link' => 'nullable',
        ]);
        
        $infocard->update($data);
        
        return redirect()->route('info-card.create')->with('success', 'न.पा./गा.वि.स. सफलतापूर्वक अपडेट भयो ');
    }

    public function destroy(InfoCard $infocard)
    {
        $infocard->delete();
    
        return redirect()->back()->with('success', 'न.पा./गा.वि.स. हटाइएको छ');
    }
}
