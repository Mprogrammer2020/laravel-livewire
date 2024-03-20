<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Plant;

class PlantController extends Controller
{
    public function plantlist(){
        return view('admin.plants.list');
    }

    public function addplant(){
        return view('admin.plants.add');
    }
}
