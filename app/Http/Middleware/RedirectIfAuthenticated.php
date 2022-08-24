<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //ログインしているかのチェック
        if (Auth::guard($guard)->check()) {
            //ログイン済みの場合は RouteServiceProvider::HOME にリダイレクト
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
