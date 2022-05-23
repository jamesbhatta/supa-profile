<?php

namespace App\Services;

use App\OnlineApplication;
use App\Organization;
use Illuminate\Pipeline\Pipeline;

class OnlineApplicationService
{
    public function all()
    {
        $onlineApplications = $this->onlineApplicationPipeline()
            ->with(['organization', 'organization.province', 'organization.district', 'organization.municipality', 'organization.ward'])
            ->paginate(request('per_page') ?? config('constants.online_application.per_page'));

        return $onlineApplications;
    }

    public function onlineApplicationPipeline()
    {
        return app(Pipeline::class)
            ->send(OnlineApplication::query())
            ->through([
                \App\QueryFilters\TokenNumber::class,
            ])
            ->thenReturn();
    }

    public function create(Organization $organization)
    {
        $onlineApplication = new OnlineApplication();
        $onlineApplication->token_number = $this->generateToken($organization->id);
        $onlineApplication->organization_id = $organization->id;
        $onlineApplication->applicant_ip = request()->ip();
        $organization->onlineApplication()->save($onlineApplication);

        return $onlineApplication->token_number;
    }

    public static function generateToken($org_id)
    {
        return (int)((10 + $org_id) . mt_rand(1000, 9999));
    }
}
