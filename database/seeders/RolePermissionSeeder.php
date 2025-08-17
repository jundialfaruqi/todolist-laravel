<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage roles']);
        Permission::create(['name' => 'manage tasks']);

        // Create roles and assign existing permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(['manage users', 'manage roles', 'manage tasks']);

        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo(['manage tasks']);

        // Assign a role to a user (example: assign 'admin' role to the first user)
        // Make sure you have at least one user in your database or create one here
        // \App\Models\User::factory()->create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@example.com',
        //     'password' => bcrypt('password'),
        // ])->assignRole('admin');

        // \App\Models\User::factory()->create([
        //     'name' => 'Regular User',
        //     'email' => 'user@example.com',
        //     'password' => bcrypt('password'),
        // ])->assignRole('user');
    }
}
