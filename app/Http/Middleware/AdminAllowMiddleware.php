<?php

namespace App\Http\Middleware;

use Closure;

class AdminAllowMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->role == 'admin') {
            return $next($request);
        }
    
        return redirect()->route('home');


   
    }
}
