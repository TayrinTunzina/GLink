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
        //return $request->expectsJson() ? null : route('login');
    }

    public function handle($request, Closure $next)
    {
        // Get the user's role from the database.
        $role = Auth::user()->role;

        // Check the user's role and redirect them to the appropriate page.
        if ($role === 'donor') {
            return redirect('donors');
        } else if ($role === 'admin') {
            return redirect('admin');
        } else {
            // Redirect to the home page if the user's role is not recognized.
            return redirect('/');
        }
    }

}
