<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsUserDashboard;
use App\Models\Post;
use Illuminate\Support\Facades\Log;
use App\Models\Order;



class DashboardController extends Controller
{
    public function index()
    {
        //Log::info('DashboardController index');

        $dashboarddetails = CmsUserDashboard::where('cms_page_id', '1')->get();
        $posts = Post::with('user')->get()->sortByDesc('id');

        // $harvestSnapshot['plants'] = auth()->user()->plants->sum('pivot.quantity');
        $harvestSnapshot['plants'] = auth()->user()->orders->where('is_completed','1')->sum('quantity');
        $harvestSnapshot['harvest_progress'] = auth()->user()->harvest_progress;

        // dd($harvestSnapshotPlants);
        return view('user.dashboard', ['details' => $dashboarddetails, 'posts' => $posts, 'harvestSnapshot' => $harvestSnapshot]);
    }
}
