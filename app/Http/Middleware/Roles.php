<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        $newRol = explode('|', $roles);
        $roleName = $request->user()->role->slug;
//        dd(Route::current()->uri,$roleName);
        if (Route::current()->uri == 'home' && $roleName == 'superadmin') {
            return redirect()->route('admin.dashboard');
        }
        if (!in_array($roleName, $newRol))
            return abort(403, __('Unauthorized'));

        return $next($request);
    }
}
