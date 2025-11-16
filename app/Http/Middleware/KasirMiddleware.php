<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KasirMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $user = auth()->user();
            
            // Check if user has role column
            try {
                if (isset($user->role) && $user->role === 'kasir') {
                    return $next($request);
                }
            } catch (\Exception $e) {
                // If role column doesn't exist, allow access for now
                // This handles the case where migration hasn't been run yet
                return $next($request);
            }
        }

        return redirect()->route('login')->with('error', 'Akses ditolak! Anda harus login sebagai kasir.');
    }
}