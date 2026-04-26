<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            // Récupérer l'utilisateur authentifié
            $user = auth()->user();

            // Stocker le type d'utilisateur dans la session
            if ($user instanceof \App\Models\Donneur) {
                session(['user_type' => 'donneur']);
            } elseif ($user instanceof \App\Models\Responsable) {
                session(['user_type' => 'responsable']);
            }
        }

        return $next($request);
    }
}
