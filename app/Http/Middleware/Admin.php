<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Si no estas aut vas a login
        if (!Auth()->check()) {
            return redirect('/login');
        }

        //Si no eres admin te vas al home
        if (auth()->user()->role != 'admin') {
            return redirect('/');
        }

        return $next($request);
    }
}
