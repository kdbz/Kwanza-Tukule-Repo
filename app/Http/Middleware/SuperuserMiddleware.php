<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Closure;

class SuperuserMiddleware
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
        if (!$this->isSuperuser($request)) {
            abort(Response::HTTP_UNAUTHORIZED);
        } 
        return $next($request);
    }
    protected function isSuperuser($request)
    {
        return $request->user()->role  == 'superuser';
    }
}
