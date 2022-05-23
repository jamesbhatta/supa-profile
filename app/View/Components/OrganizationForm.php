<?php

namespace App\View\Components;

use App\Organization;
use App\Services\FiscalYearService;
use Illuminate\View\Component;

class OrganizationForm extends Component
{

    public $provinces;
    public $districts;
    public $municipalities;
    public $wards;
    public $organizationTypes;
    public $fiscalYears;
    public $organization;
    public $organizationName;
    public $oldDataEntryMode;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($organization = null, $oldDataEntryMode = false)
    {
        $this->provinces = \App\Province::all(['id', 'name', 'name_en']);
        $this->districts = \App\District::with('province')->get(['id', 'name', 'name_en', 'province_id']);
        $this->municipalities = \App\Municipality::with('district')->get(['id', 'name', 'name_en', 'district_id']);
        $this->wards = \App\Ward::all('id', 'name', 'name_en')->sortBy('name_en');
        $this->organizationTypes = \App\OrganizationType::latest()->get();
        $this->fiscalYears = app()->make(FiscalYearService::class)->get();
        $this->organization = $organization ?? new Organization();
        $this->organizationName = request()->query('org_name');
        $this->oldDataEntryMode = $oldDataEntryMode;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.organization-form');
    }
}
