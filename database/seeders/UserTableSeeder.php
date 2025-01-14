<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminUser= User::create([
            'name' => "Super Admin",
            'email' => "admin@admin.com",
            'password' => Hash::make("11111111"),
            'active'=>true
        ]);
        $superAdminUser->assignRole('SUPER-ADMIN');
        User::factory(50)->create()->each(function ($user) {
            $user->assignRole('CLIENT');
        });
    }
}
