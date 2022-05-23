<?php

namespace App\View\Components\Format;

use App\OnlineApplication;
use App\Organization;
use Illuminate\View\Component;

class TokenLetter extends Component
{
    public $organization;
    public $onlineApplication;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Organization $organization, OnlineApplication $onlineApplication)
    {
        $this->organization = $organization;
        $this->onlineApplication = $onlineApplication;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.format.token-letter');
    }
}
