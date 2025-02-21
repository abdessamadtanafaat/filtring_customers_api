<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BasicAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated via Basic Auth or session
        if (session('authenticated') || $this->checkBasicAuth($request)) {
            return $next($request);
        }

        // Redirect to login page if not authenticated
        return redirect()->route('custom-login');
    }

    protected function checkBasicAuth(Request $request)
    {
        $username = env('BASIC_AUTH_USER', 'admin');
        $password = env('BASIC_AUTH_PASS', 'password');

        return $request->getUser() === $username && $request->getPassword() === $password;
    }
}




