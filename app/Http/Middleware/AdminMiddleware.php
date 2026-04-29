<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
{
    if (auth()->check() && auth()->user()->is_admin) {
        return $next($request);
    }

    return redirect('/')->with('error', "Vous n'avez pas les droits du Sage pour accéder à cette page.");
}
}
