<?php

namespace Database\Seeders;

use App\Models\IssueCategory;
use Illuminate\Database\Seeder;

class IssueCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $issues = ['General concerns', 'Technical issue', 'Billing issue'];
        foreach ($issues as $key => $issue) {
            IssueCategory::create(['name' => $issue]);
        }
    }
}
