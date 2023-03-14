<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
    public function handle($request, Closure $next) {

        /**
         * Checks if user is Admin
        */
        if(Auth::user()->role == '1'){

            //redirect to admin login
            return $next($request);

        } elseif(Auth::user()->role == '0'){
            abort(403);
        }

    }
}