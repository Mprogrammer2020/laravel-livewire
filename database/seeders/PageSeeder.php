<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages=['HOME','BUILD-MY-STRAIN'];
        foreach ($pages as $key => $page) {
            Page::create(['name' => $page,'title'=>$page]);
        }
    }
}
