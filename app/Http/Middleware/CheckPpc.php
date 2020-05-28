<?php

namespace App\Http\Middleware;

use Closure;

class CheckPpc
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
        if ($request->user() && $request->user()->role == 'ppcMan' || $request->user()->role == 'ppc')
        {
            return $next($request);
        } else {
            return abort(401);
        }
    }
}
