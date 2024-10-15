<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

       if(Auth::guard('admin')->check()){
        return redirect(route('dashboard.index'));
       }else if(Auth::guard('author')->check()){
        return redirect(route('dashboard.index'));
       }else if(Auth::guard('user')->check()){
        return redirect(route('dashboard.index'));
       }

        return $next($request);
    }
}
