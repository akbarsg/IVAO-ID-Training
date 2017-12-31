<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckStaff
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
        if (Auth::user()->isStaff != 1) {
            return redirect('/');
        }
        return $next($request);
    }
}
