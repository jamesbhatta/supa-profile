<?php

namespace App\View\Components;

use App\Organization;
use Illuminate\View\Component;

class SubsidiaryList extends Component
{
    public Organization $organization;

    public function __construct(Organization $organization)
    {
        $this->organization = $organization;
    }

    public function render()
    {
        $subsidiaries = $this->organization->subsidiaries;
        
        return view('components.subsidiary-list', [
            'subsidiaries' => $subsidiaries
        ]);
    }
}
