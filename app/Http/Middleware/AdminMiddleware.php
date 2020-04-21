<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Closure;

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
        if (!$this->isAdmin($request)) {
            abort(Response::HTTP_UNAUTHORIZED);
        } 
        
        return $next($request);
    }

    protected function isAdmin($request)
    {
        return $request->user()->role  == 'admin';
    }
}


