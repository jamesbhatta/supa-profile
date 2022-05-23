<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function setlocale($locale = 'np')
    {
        if (!in_array($locale, ['en', 'np'])) {
            abort(404);
        }
        Session::put('locale', $locale);

        return redirect()->back();
    }
}
