<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign existing permissions
        $superAdmin = Role::create(['name' => RolesEnum::SUPER_ADMIN->value]);
        $admin = Role::create(['name' => RolesEnum::ADMIN->value]);
        $writer = Role::create(['name' => RolesEnum::WRITER->value]);

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'username' => 'super_admin'
        ]);
        $user->assignRole($superAdmin);

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin'
        ]);
        $user->assignRole($admin);

        $user = \App\Models\User::factory()->create([
            'name' => 'Writer',
            'username' => 'writer'
        ]);
        $user->assignRole($writer);
    }
}
