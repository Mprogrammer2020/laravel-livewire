<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         Log::info('RedirectIfAuthenticated check');
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }
        // Log::info('RedirectIfAuthenticated');

        // if (Auth::check()) {
        //     $role = Auth::user()->role_name;
        //     switch ($role) {
        //         case 'SUPER-ADMIN':
        //             return redirect(RouteServiceProvider::HOME);
        //             break;
        //         case 'USER':
        //             return redirect()->route('user.dashboard');
        //             break;
        //     }
        // }

        // return $next($request);
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                switch (Auth::user()->role_name) {
                    case 'SUPER-ADMIN':
                        return redirect(RouteServiceProvider::HOME);
                        break;
                    case 'USER':
                        return redirect()->route('user.dashboard');
                        break;
                }
            }
        }
        return $next($request);
    }
}
