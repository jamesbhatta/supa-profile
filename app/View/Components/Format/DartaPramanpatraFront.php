<?php

namespace App\View\Components\Format;

use Illuminate\View\Component;

class DartaPramanpatraFront extends Component
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
        $this->organization->load('subsidiaries.ward');
        return view('components.format.darta-pramanpatra-front');
    }
}
