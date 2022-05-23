<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OnlineApplication;
use App\Organization;
use App\Services\OnlineApplicationService;
use Faker\Generator as Faker;

$factory->define(OnlineApplication::class, function (Faker $faker) {
    $onlineApplicationService = new OnlineApplicationService();
    $OnlineApplicationsOrgIds = OnlineApplication::pluck('organization_id')->all();
    $organizationId = Organization::whereNotIn('id', $OnlineApplicationsOrgIds)->inRandomOrder()->pluck('id')->take(1)->first();
    $tokenNumber = $onlineApplicationService->generateToken($organizationId);

    return [
        'token_number' => $tokenNumber,
        'organization_id' => $organizationId,
        'applicant_ip' => $faker->ipv4
    ];
});
