<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifyUserSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            $currentIp = $request->ip();
            $currentUserAgent = $request->header('User-Agent');

            if ($user->last_ip !== $currentIp || $user->last_user_agent !== $currentUserAgent) {
                Auth::logout();
                return redirect()->route('login')->withErrors(['message' => 'Please login!']);
            }
        }

        return $next($request);
    }
}
