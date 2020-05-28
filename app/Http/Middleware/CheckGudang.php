<?php

namespace App\Http\Middleware;

use Closure;

class CheckGudang
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->role == 'gudStaff' || $request->user()->role == 'gudSup' || $request->user()->role == 'gudMan')
        {
            return $next($request);
        } else {
            return abort(401);
        }
    }
}
