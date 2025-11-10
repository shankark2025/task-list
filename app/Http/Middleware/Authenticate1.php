<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate1 extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            // 👇 Custom logic for guards
            if ($request->is('admin/*')) {
                return route('admin.login'); // redirect admins to admin login
            }

            return route('login'); // default user login
        }

        return null;
    }
}
