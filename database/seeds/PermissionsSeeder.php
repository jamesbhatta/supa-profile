<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::firstOrCreate(['name' => 'user.*']);
        Permission::firstOrCreate(['name' => 'user.create']);
        Permission::firstOrCreate(['name' => 'user.edit']);
        Permission::firstOrCreate(['name' => 'user.delete']);

        Permission::firstOrCreate(['name' => 'province.*']);
        Permission::firstOrCreate(['name' => 'district.*']);
        Permission::firstOrCreate(['name' => 'municipality.*']);
        Permission::firstOrCreate(['name' => 'ward.*']);

        Permission::firstOrCreate(['name' => 'organization.*']);
        Permission::firstOrCreate(['name' => 'organization.create']);
        Permission::firstOrCreate(['name' => 'organization.edit']);
        Permission::firstOrCreate(['name' => 'organization.delete']);
        Permission::firstOrCreate(['name' => 'organization.verify']);
        Permission::firstOrCreate(['name' => 'organization.register']);
        Permission::firstOrCreate(['name' => 'organization.close']);

       
    }
}
