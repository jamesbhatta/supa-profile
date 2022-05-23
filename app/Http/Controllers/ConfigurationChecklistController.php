<?php

namespace App\Http\Controllers;

use App\Services\ConfigurationChecklist;

class ConfigurationChecklistController extends Controller
{
    private $configurationChecklist;

    public function __construct(ConfigurationChecklist $configurationChecklist)
    {
        $this->middleware('role:super-admin|admin');
        $this->configurationChecklist = $configurationChecklist;
    }

    public function index()
    {
        $checklists = $this->configurationChecklist->check();
        $checklists = json_decode(json_encode($checklists), FALSE);

        return view('configuration-checklist.index', compact('checklists'));
    }
}
