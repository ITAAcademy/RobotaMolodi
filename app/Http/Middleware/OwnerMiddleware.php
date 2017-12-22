<?php

namespace App\Http\Middleware;

use Closure;

class OwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $resource)
    {
        $model = $request->{$resource};
        // Model must have isOwner method (see app/models/project);
        $userId = \Auth::id();
        if ($model->isOwner($userId)) {
          return $next($request);
        }
        return abort(403);
    }
}
