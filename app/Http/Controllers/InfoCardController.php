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
        $udpateMode = false;
        if ($infoCard->exists) {
            $udpateMode = true;
        }
        $themes = config('constants.info_card_themes');

        return view();
    }
}
