<?php

namespace App\Http\Controllers;

use App\Organization;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = 'Dashboard';

        $onlineFormsCount = 10;
        $unverifiedOrganizationsCount = 5;
        $registeredOrganizationsCount = 8;
        $closedOrganizationsCount = 2;

        $totalUsersCount = User::count();

     
        return view('home', [
            'title' => $title,
            'onlineFormsCount' => $onlineFormsCount,
            'unverifiedOrganizationsCount' => $unverifiedOrganizationsCount,
            'registeredOrganizationsCount' => $registeredOrganizationsCount,
            'closedOrganizationsCount' => $closedOrganizationsCount,
            'totalUsersCount' => $totalUsersCount,
        ]);
    }
}
