<?php

namespace App\View\Components\Format;

use Illuminate\View\Component;

class BanijyaSifarisLetter extends Component
{
    public $organization;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($organization)
    {
        $this->organization = $organization;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.format.banijya-sifaris-letter');
    }
}
