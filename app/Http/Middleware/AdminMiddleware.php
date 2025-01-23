<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if(Auth::user()->role == 'admin'){
                return $next($request);
            }else{
                Session::flush();
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }
    }
}
