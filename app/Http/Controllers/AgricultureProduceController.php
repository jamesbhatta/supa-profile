<?php

namespace App\Http\Controllers;

use App\AgricultureProduce;
use App\Province;
use Illuminate\Http\Request;

class AgricultureProduceController extends Controller
{
    public function index(AgricultureProduce $agricultureProduce)
    {
        $provinces=Province::get();
        return view('agriculture.agriculture_produce.index',compact(['agricultureProduce','provinces']));
    }
}
