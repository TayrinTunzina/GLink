<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        $role = $request->input('login-role'); // Assuming you have a 'login-role' field in your form

        if ($role === 'admin') {
            return route('admin.auth'); // Redirect to the admin login page
        } elseif ($role === 'donor') {
            return route('donors.auth'); // Redirect to the donor login page
        } else {
            return route('login'); // Redirect to the default login page if the role is not recognized
        }
    }
}
