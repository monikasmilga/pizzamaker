<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAccess
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
       if(in_array('member', auth()->user()->connection->pluck('roles_id')->toArray()))
            return $next($request);

        abort (403, 'Access denied');
    }
}
