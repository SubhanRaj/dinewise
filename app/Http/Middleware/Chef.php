<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Chef
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('abcdefgh')) {
            $token = session()->get('abcdefgh');
            $verification = verifyLogin($token);
            $status = $verification['status'];
            $data = $verification['data'];

            if ($status == 1 || $status === true) {
                $role = $data['role'];
                if ($role == 'CHEF') {
                    return $next($request);
                } else {
                    return redirect()->route('login-view');
                }
            } else {
                return redirect()->route('login-view');
            }
        } else {
            return redirect()->route('login-view');
        }
    }
}
