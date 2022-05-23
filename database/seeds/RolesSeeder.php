<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminEmail =  'jmsbhatta@gmail.com';
        $superAdminUsername =  'jmsbhatta';

        // create super admin and assign existing permissions
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $superadminUser = \App\User::whereEmail($superAdminEmail)->first() ?? Factory(App\User::class)->create([
            'name' => 'Super Admin',
            'email' => $superAdminEmail,
            'username' => $superAdminUsername,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $superadminUser->assignRole($superAdmin);

        // permissions to admin
        $admin = Role::firstOrCreate(['name' => 'admin']);
    }
}
