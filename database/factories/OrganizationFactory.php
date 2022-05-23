<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Organization;
use Faker\Generator as Faker;

$factory->define(Organization::class, function (Faker $faker) {
    $province = \App\Province::inRandomOrder()->first();
    $district = \App\District::inRandomOrder()->first();
    $municipality = \App\Municipality::inRandomOrder()->first();
    $ward = \App\Ward::inRandomOrder()->first();
    return [
        'org_name' => $faker->company,
        'application_date' => $faker->date,
        'org_province_id' => $province->id,
        'org_district_id' => $district->id,
        'org_municipality_id' => $municipality->id,
        'org_ward_id' => $ward->id,
        'org_road_name' => $faker->address,
        'org_house_no' => random_int(20, 50),
        'org_phone' => $faker->e164PhoneNumber,
        'org_type' => '',
        'org_established_nep_date' => $faker->date,
        'org_total_capital' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'org_ownership' => '',
        'org_house_owner_name' => $faker->name,
        'org_house_owner_phone' => $faker->e164PhoneNumber,
        'org_house_rent' => 15000,
        'org_region_type' => '',

        'verified' => (bool)random_int(0,1)
    ];
});
