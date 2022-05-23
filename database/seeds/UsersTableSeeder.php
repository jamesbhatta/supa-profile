<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin created in PermissionsSeeder::class
        // DB::table('users')->insert([
        //     'name' => 'James Bhatta',
        //     'email' => 'jmsbhatta@gmail.com',
        //     'username' => 'jmsbhatta',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        // ]);
    }
}
