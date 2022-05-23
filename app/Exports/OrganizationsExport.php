<?php

namespace App\Exports;

use App\Organization;
use App\Services\OrganizationService;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrganizationsExport implements FromView
{
    public function view(): View
    {
        $organizations = (new OrganizationService)->all();

        return  view('exports.organizations', compact(['organizations']));
    }
}
