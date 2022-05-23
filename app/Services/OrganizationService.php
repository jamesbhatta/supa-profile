<?php

namespace App\Services;

use App\Organization;
use Illuminate\Pipeline\Pipeline;

class OrganizationService
{
    public function all()
    {
        $organizations = $this->getOrganizationPipeline()
            ->with(['onlineApplication', 'province', 'district', 'municipality', 'ward']);

        if (request()->query('export')) {
            return $organizations->get();
        }
        
        return $organizations->paginate(request('per_page') ?? config('constants.organization.per_page'));
    }

    public function getOrganizationPipeline()
    {
        return app(Pipeline::class)
            ->send(Organization::query())
            ->through([
                \App\QueryFilters\Verified::class,
                \App\QueryFilters\Registered::class,
                \App\QueryFilters\Closed::class,
                \App\QueryFilters\Checked::class,
                \App\QueryFilters\RegisteredDate::class,
                \App\QueryFilters\OrderBy::class,
                \App\QueryFilters\RegistrationNumber::class,
                \App\QueryFilters\OrgType::class,
                \App\QueryFilters\OrgName::class,
                \App\QueryFilters\FiscalYear::class,
                \App\QueryFilters\WardId::class,
                \App\QueryFilters\Trashed::class,
                \App\QueryFilters\PropPhone::class,
            ])
            ->thenReturn();
    }

    public function create(array $attributes)
    {
        $organization = Organization::create($attributes);

        return $organization;
    }

    public function update(Organization $organization, array $attributes)
    {
        $organization->update($attributes);
        return $organization;
    }

    public function find($id)
    {
        return Organization::findOrFail($id);
    }

    public function findMany(array $ids)
    {
        return Organization::find($ids);
    }

    public function findManyUnchecked(array $ids)
    {
        return Organization::checked(false)->latest()->find($ids);
    }

    public function loadRelations($organization)
    {
        return $organization->load(['onlineApplication', 'province', 'district', 'municipality', 'ward', 'documents', 'subsidiaries.ward']);
    }

    public function markChecked($organization, $appliedDate)
    {
        $organization->applied_date = $appliedDate;
        $organization->applied_date_ad = bs_to_ad($organization->applied_date);
        $organization->save();
        return true;
    }

    public function markVerified($organization, $verifiedDate)
    {
        $organization->verified_date = $verifiedDate;
        $organization->verified_date_ad = bs_to_ad($organization->verified_date);
        $organization->save();
        return true;
    }

    public function markRegistered($organization, $registeredDate, $orgRegistrationNum = null)
    {
        $organization->registered_date = $registeredDate;
        $organization->registered_date_ad = bs_to_ad($organization->registered_date);
        if ($orgRegistrationNum) {
            $organization->org_reg_no = $orgRegistrationNum;
        } else {
            // generate registration number
            $organization->org_reg_no = $this->generateRegistrationNumber($organization);
            // Increment the registration number prefix
            $this->incrementRegistrationAutoIncrementPrefix();
        }

        $organization->save();

        return true;
    }

    public function renew($organization, $request)
    {
        $organization->renewed_date =  $request->renewed_date;
        $organization->renewed_date_ad = bs_to_ad($organization->renewed_date);
        $organization->renew_amount =  $request->renew_amount;
        $organization->renew_bill_no =  $request->renew_bill_no;
        $organization->update();

        return true;
    }

    public function markClosed($organization, $closedDate)
    {
        $organization->closed_date = $closedDate;
        $organization->closed_date_ad = bs_to_ad($organization->closed_date);
        $organization->save();
        return true;
    }

    public function rename(Organization $organization, $newName)
    {
        $organization->update(['org_name' => $newName]);
        if ($organization->wasChanged('org_name')) {
            $organization->increment('name_change_count');
        }
        return $organization;
    }

    public function generateRegistrationNumber(Organization $organization)
    {
        return settings()->get('registration_number_suffix') . settings()->get('registration_auto_increment_prefix');
    }

    public function incrementRegistrationAutoIncrementPrefix()
    {
        $incrementedValue = ((int)settings()->get('registration_auto_increment_prefix')) + 1;
        return settings()->set('registration_auto_increment_prefix', $incrementedValue);
    }
}
