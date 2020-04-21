<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Closure;

class CustomerMiddleware
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
        if (!$this->isCustomer($request)) {
            abort(Response::HTTP_UNAUTHORIZED);
        } 
        return $next($request);
    }
    protected function isCustomer($request)
    {
        return $request->user()->role  == 'customer';
    }
}
