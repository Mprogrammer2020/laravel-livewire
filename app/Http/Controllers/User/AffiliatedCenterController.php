<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AffiliatedCenter;
use App\Models\Order;
use DB;

class AffiliatedCenterController extends Controller {

    public function index() {

        $affiliatedCenter = AffiliatedCenter::first();
        $salesCount = 0;
        $refferralUserIds = auth()->user()->referrals->pluck('id')->toArray();
        $salesCount = Order::whereIn('user_id', $refferralUserIds)
                        ->where('is_completed', '1')->sum('quantity');
        $totalCommission = rtrim(rtrim(sprintf("%.18f",auth()->user()->affiliateCommissions->sum('commission_amount')),'0'),'.');
        return view('user.affiliated-center', compact('affiliatedCenter', 'salesCount', 'totalCommission'));
    }

}
