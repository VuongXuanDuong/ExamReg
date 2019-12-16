<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class StudentMiddleware
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
      if (Auth::user() &&  Auth::user()->role == 3) {
                 return $next($request);
          }

         return abort(404);
    }
}
