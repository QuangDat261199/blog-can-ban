<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            if (Auth::user()->is_admin) {
                return $next($request);
            }
            return redirect()->route('admin.auth.login')->with('error', 'Permission denied');
        }
        return redirect()->route('admin.auth.login')->with('error', 'Permission denied');
    }
}
