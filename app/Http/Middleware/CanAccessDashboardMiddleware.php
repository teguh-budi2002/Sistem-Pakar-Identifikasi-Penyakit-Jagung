<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CanAccessDashboardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && auth()->user()->role->role_name !== 'Admin') {
            return redirect()->route('home')->with('only-admin-can-access-dashboard', 'Hanya Admin yang boleh mengakses dashboard.');
        } else {
            return $next($request);
        }
        
    }
}
