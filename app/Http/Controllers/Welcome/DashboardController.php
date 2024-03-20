<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class DashboardController extends Controller
{

    public function index()
    {
        $userid = Auth::user()->id;

        return view('welcome.dashboard', ['users' => $users]);
    }
}
