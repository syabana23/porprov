<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadminRole = Role::where('name', 'superadmin')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $executiveRole = Role::where('name', 'executive')->first();

        if ($superadminRole) {
            User::updateOrCreate(
                ['email' => 'superadmin@porprov.com'],
                [
                    'name' => 'Super Admin',
                    'full_name' => 'Super Admin',
                    'email' => 'superadmin@porprov.com',
                    'password' => Hash::make('password'),
                    'role_id' => $superadminRole->id,
                    'is_active' => true,
                ]
            );
        }

        if ($adminRole) {
            User::updateOrCreate(
                ['email' => 'admin@porprov.com'],
                [
                    'name' => 'Admin',
                    'full_name' => 'Admin PORPROV',
                    'email' => 'admin@porprov.com',
                    'password' => Hash::make('password'),
                    'role_id' => $adminRole->id,
                    'is_active' => true,
                ]
            );
        }

        if ($executiveRole) {
            User::updateOrCreate(
                ['email' => 'executive@porprov.com'],
                [
                    'name' => 'Executive',
                    'full_name' => 'Executive PORPROV',
                    'email' => 'executive@porprov.com',
                    'password' => Hash::make('password'),
                    'role_id' => $executiveRole->id,
                    'is_active' => true,
                ]
            );
        }
    }
}
