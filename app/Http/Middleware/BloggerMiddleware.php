<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Closure;

class BloggerMiddleware
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
        if (!$this->isBlogger($request)) {
            abort(Response::HTTP_UNAUTHORIZED);
        } 
        return $next($request);
    }
    protected function isBlogger($request)
    {
        return $request->user()->role  == 'blogger';
    }
}
