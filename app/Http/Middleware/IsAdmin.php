<?php

namespace App\Http\Middleware;

use App\Http\Middleware\Login;
use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role_as == 1) {
            return $next($request);
        }

        return redirect('login')->with('error', "You don't have admin access.");
    }
}
