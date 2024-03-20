<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function signout(){
        Auth::logout();
        return redirect('/admin');
      }

}
