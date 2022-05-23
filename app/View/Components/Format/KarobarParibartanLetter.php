<?php

namespace App\View\Components\Format;

use App\Organization;
use Illuminate\View\Component;

class KarobarParibartanLetter extends Component
{
    public $organization;
    public $karobarParibartan;
   
    public function __construct(Organization $organization)
    {
        $this->organization = $organization;
        $this->karobarParibartan = $this->organization->karobarParibartans()->latest('date_en')->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.format.karobar-paribartan-letter');
    }
}
