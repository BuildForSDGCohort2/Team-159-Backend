<?php

namespace App\Http\Middleware;

use Closure;

class isClient
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
        if(!$request->user()->isClient()){
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        
        return $next($request);
    }
}
