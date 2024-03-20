<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlantJourneyController extends Controller
{
    public function index()
    {
        return view('user.plant-journey');
    }
}
