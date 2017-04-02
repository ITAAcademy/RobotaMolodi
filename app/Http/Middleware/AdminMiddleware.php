<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\User_Role;
use Auth;

class AdminMiddleware
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
        if(Auth::User()){
            $user = User::find(Auth::user()->id);

            if ($user->role->name == 'Admin')
            {
                return $next($request);
            }else{
                return redirect()->guest('/');
            }
        }else{
            return redirect()->guest('auth/login');
        }
    }
}