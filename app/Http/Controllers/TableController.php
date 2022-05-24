<?php

namespace App\Http\Controllers;

use App\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index($key)
    {
        $table = Table::where('key', $key)->firstOrFail();

        return $table;
    }

    public function store($key)
    {
        $table->
    }
}
