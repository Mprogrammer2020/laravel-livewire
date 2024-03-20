<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CmsUserDashboard;
class CmsUserDashboardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_dashboard= CmsUserDashboard::create([
            'header_title' => "Welcome to Gentlemen’s Cannabis!",
            'video_link' => 'https://player.vimeo.com/video/489074213',
            'description' => "Donec orci mi, scelerisque ac sodales sed, pharetra quis quam. Ut ut velit enim. Vivamus feugiat sagittis urna a aliquam. Suspendisse non metu. Pellentesque massa orci, varius ut iaculis non, tempus rutrum urna. Mauris eget nunc condimentum, aliquam orci non, ultricies metus. Proin",
            'video_thumbnail_image'=>"img1.png",
            'cms_page_id' => "1"
        ]);
    }
}
