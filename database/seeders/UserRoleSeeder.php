<?php

namespace Database\Seeders;

use App\Models\RoleUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoleUser::create([
            'id' => 1,
            'role_name' => 'Admin',
        ]);

        RoleUser::create([
            'id' => 2,
            'role_name' => 'Member',
        ]);
    }
}
