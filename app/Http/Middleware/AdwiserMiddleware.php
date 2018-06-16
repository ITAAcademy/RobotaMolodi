<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\User_Role;
use Auth;

class AdwiserMiddleware
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
        if (Auth::user()->isAdwiser())
        {
            return $next($request);

        }else{

            return redirect()->guest('/');

        }
    }
}
