<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, String $role)
    {

        if (is_null(Auth::user()) || ($role == "USER" && $request->user()->role_name != "USER")) {
            $redirectedPath = $this->redirectToRoute($role);
            return redirect($redirectedPath);
        } elseif (is_null(Auth::user()) || ($role == "SUPER-ADMIN" && $request->user()->role_name != "SUPER-ADMIN")) {
            Log::info('inside role super-admin role ' . $request->user()->role_name);
            $redirectedPath = $this->redirectToRoute($role);
            return redirect($redirectedPath);
        }
        return $next($request);
    }
    public function redirectToRoute($role)
    {
        if ($role == 'SUPER-ADMIN')
            return 'admin/login';
        elseif ($role == 'USER')
            return 'user/login';
        else '/';
    }
}
