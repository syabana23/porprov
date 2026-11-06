<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'superadmin',
                'display_name' => 'Super Admin',
                'permissions' => ['*'],
                'is_active' => true,
            ],
            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'permissions' => [
                    'dashboard.view',
                    'venues.*',
                    'sports.*',
                    'contingents.*',
                    'schedules.*',
                    'standings.*',
                    'facilities.*',
                    'galleries.*',
                ],
                'is_active' => true,
            ],
            [
                'name' => 'executive',
                'display_name' => 'Executive',
                'permissions' => [
                    'dashboard.view',
                    'venues.view',
                    'sports.view',
                    'contingents.view',
                    'schedules.view',
                    'standings.view',
                    'facilities.view',
                    'galleries.view',
                ],
                'is_active' => true,
            ],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(['name' => $role['name']], $role);
        }
    }
}
