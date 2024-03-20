<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserRoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(CmsPageTableSeeder::class);
        $this->call(CmsUserDashboardTableSeeder::class);
        // $this->call(AffiliatedCenterSeeder::class);
        $this->call(IssueCategorySeeder::class);
        // \App\Models\User::factory(50)->create();
    }
}
