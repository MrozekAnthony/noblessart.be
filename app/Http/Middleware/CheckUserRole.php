<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role->priority == 4) {
            // Redirigez vers où vous voulez, par exemple, la page d'accueil
            return redirect()->route('dashboard.index')->with('error', 'Vous n\'avez pas accès à cette page');
        }
        return $next($request);
    }
}
