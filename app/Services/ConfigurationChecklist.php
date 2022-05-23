<?php

namespace App\Services;

use PDO;

class ConfigurationChecklist
{
    private $checklist = [];

    public function check()
    {
        $this->checkSettings('app_name', 'Application name in settings');
        $this->checkSettings('app_name_en',);
        $this->checkSettings('registration_number_prefix',);
        $this->checkSettings('registration_certificate_note',);
        $this->checkSettings('registration_auto_increment_prefix',);
        $this->checkSettings('registration_number_suffix',);

        $this->pushToCheckList([
            'status' => runningFiscalYear(),
            'title' => 'Running Fiscal Year',
            'description' => 'Current value: ' . runningFiscalYear()
        ]);

        $provincesCount = \App\Province::count();
        $this->pushToChecklist([
            'status' => $provincesCount,
            'title' => 'At least one Province',
            'description' => 'Number of provinces: ' . $provincesCount
        ]);

        $districtsCount = \App\District::count();
        $this->pushToChecklist([
            'status' => $districtsCount,
            'title' => 'At least one District',
            'description' => 'Number of districts: ' . $districtsCount
        ]);

        $municipalitiesCount = \App\Municipality::count();
        $this->pushToChecklist([
            'status' => $municipalitiesCount,
            'title' => 'At least one Municipality',
            'description' => 'Number of municipalities: ' . $municipalitiesCount
        ]);

        $wardsCount = \App\Ward::count();
        $this->pushToChecklist([
            'status' => $wardsCount,
            'title' => 'At least one Ward',
            'description' => 'Number of wards: ' . $wardsCount
        ]);
        // unset temp variables
        unset($provincesCount, $districtsCount, $municipalitiesCount, $wardsCount);

        $rolesCount = \Spatie\Permission\Models\Role::count();
        $roles = \Spatie\Permission\Models\Role::all()->pluck('name');
        $this->pushToChecklist([
            'status' => $rolesCount,
            'title' => 'At least one Role',
            'description' => (string)$roles
        ]);

        $superadmins = \App\User::whereHas("roles", function ($q) {
            $q->where('name', 'super-admin');
        })->get('name')->pluck('name');

        $this->pushToChecklist([
            'status' => $rolesCount,
            'title' => 'At least one Super Admin',
            'description' => (string)$superadmins
        ]);
        unset($rolesCount, $roles);

        return $this->checklist;
    }

    private function checkSettings($key, $title = null)
    {
        return array_push($this->checklist, [
            'status' => is_null(settings()->get($key)) ? false : true,
            'title' => $title ? $title : ucfirst(str_replace('_', ' ', $key)),
            'description' => 'Current value: ' . settings()->get($key)
        ]);
    }

    private function pushToChecklist($arr)
    {
        array_push($this->checklist, $arr);
    }
}
