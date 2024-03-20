<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\CmsPage;
use App\Models\CmsUserDashboard;

class IndexController extends Controller {

    public function getIndex() {
        $cmsPage = CmsPage::where('name', 'HOME-PAGE')->first();
        $cms_user_dshboard = new \stdClass();
        if ($cmsPage != null) {
            $cms_user_dshboard = CmsUserDashboard::where('cms_page_id', $cmsPage->id)->first();
        }
        $page = Page::whereName('HOME')->first();
        return view('welcome.index', compact('page', 'cms_user_dshboard'));
    }

    public function getApply() {
        return redirect()->away('https://calendly.com/marketmaker/gentlemenscannabis');
    }

    public function getwebinar() {
        return redirect()->away('https://www.gentlemencompany.com/webinar');
    }

}
