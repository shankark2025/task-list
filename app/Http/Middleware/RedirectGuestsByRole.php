<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;
class RedirectGuestsByRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */



    public function handle(Request $request, Closure $next): Response
    {


         // If user is not authenticated
        if (!Auth::check()) {
            // Check route for admin dashboard or admin prefix
            if ($request->is('admin/*') || $request->routeIs('admin.dashboard')) {
                //return redirect('/admin/login');
            }
            // Default: redirect to normal login
            return redirect('/login');
        }

        return $next($request);
    }
}
