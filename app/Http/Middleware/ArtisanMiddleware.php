<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArtisanMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * Vérifie connexion artisan
         */
        if (!auth()->guard('artisan')->check()) {

            return redirect(
                '/artisan/login'
            );
        }

        return $next($request);
    }
}