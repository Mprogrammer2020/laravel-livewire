<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AffiliatedCenter;

class AffiliatedCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'cms_page_id'   =>  '2',
            'video_thumbnail_image' =>  'user_assets/images/img1.png',
            'video_link'    =>  'https://player.vimeo.com/video/489074213',
            'step1_content' =>  'Donec pulvinar congue mauris. Ut pretium bibendum tempor. Mauris non nibh et tellus feugiat eleifend. Proin a risus dolor. Proin lacinia, nunc at rhoncus suscipit, sem erat congue nisi, a consequat felis lectus et mauris.',
            'step2_content' =>  'Donec pulvinar congue mauris. Ut pretium bibendum tempor. Mauris non nibh et tellus feugiat eleifend. Proin a risus dolor. Proin lacinia, nunc at rhoncus suscipit, sem erat congue nisi, a consequat felis lectus et mauris.',
            'step3_content' =>  'Donec pulvinar congue mauris. Ut pretium bibendum tempor. Mauris non nibh et tellus feugiat eleifend. Proin a risus dolor. Proin lacinia, nunc at rhoncus suscipit, sem erat congue nisi, a consequat felis lectus et mauris.',
        ];
        $affiliatedCenter = AffiliatedCenter::create($data);
    }
}
