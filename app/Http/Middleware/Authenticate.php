<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If no specific guard passed, use default ('web')
        if ($request->is('admin/*')) {
            if (!Auth::guard('admin')->check()) {
                return redirect('/admin/login');
            }
        } else {
            if (!Auth::guard('web')->check()) {
                return redirect('/login');
            }
        }

        return $next($request);
    }
}
