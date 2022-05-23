<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(AddressSeeder::class);

        if (app()->environment() == 'production') {
        } else {
        }
    }
}
