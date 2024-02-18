<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminOrAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'super_admin') {
            return $next($request);
        }

        return redirect()
            ->route('dashboard')
            ->with('danger', 'You don\'t have permission for this action');
    }
}
