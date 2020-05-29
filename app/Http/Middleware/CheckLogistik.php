<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogistik
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
        if ($request->user() && $request->user()->role == 'logMan' || $request->user()->role == 'logUudp' || $request->user()->role == 'logSup' || $request->user()->role == 'logStaff')
        {
            return $next($request);
        } else {
            return abort(401);
        }
    }
}
