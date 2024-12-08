<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_user_id' => 1,
            'username' => 'teguh-admin',
            'fullname' => 'Teguh Budi Laksono',
            'email' => 'teguhbudi@gmail.com',
            'password' => 'teguhbudi',
            'gender' => 'L',
        ]);
    }
}
