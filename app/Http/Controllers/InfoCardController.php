<?php

namespace App\Http\Controllers;

use App\InfoCard;
use Illuminate\Http\Request;

class InfoCardController extends Controller
{
    public function listingApi()
    {
        $infoCards = InfoCard::get();

        return response()->json($infoCards, 200);
    }
}
