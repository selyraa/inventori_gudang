<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);
        if (Auth::check()){
            if (Auth::user()->role == '1'){
                return $next($request);
            } else {
                return redirect('/welcome')->with('message', 'Access Denied as you are not Admin');
            }
        }else {
            return redirect('/login')->with('message', 'Login to acccess the website informations');
        }
        
    }
}
