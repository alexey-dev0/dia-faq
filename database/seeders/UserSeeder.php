<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->createAdmin();
    }

    /**
     * Creates admin role and single user with it
     */
    private function createAdmin(): void
    {
        $adminRole = Role::firstOrCreate(
            ['name' => 'admin'],
            ['description' => 'User with all permits']
        );

        $admin = User::firstOrCreate(
            ['nickname' => config('settings.admin.nickname')],
            [
                'email' => config('settings.admin.email'),
                'password' => bcrypt(config('settings.admin.password'))
            ]
        );

        $admin->roles()->attach($adminRole);
    }
}
