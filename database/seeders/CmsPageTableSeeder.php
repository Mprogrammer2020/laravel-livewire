<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Seeder;

class CmsPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cmsPages = ['USER-DASHBOARD', 'AFFILITED-CENTER'];
        foreach ($cmsPages as $key => $page) {
            CmsPage::create(['name' => $page]);
        }
    }
}
