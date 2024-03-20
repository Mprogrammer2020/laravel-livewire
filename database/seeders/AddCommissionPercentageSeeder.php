<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminConfiguration;

class AddCommissionPercentageSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        AdminConfiguration::create([
            'key_name' => 'commission_percentage',
            'value' => '2'
        ]);
    }

}
