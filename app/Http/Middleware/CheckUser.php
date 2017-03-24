<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUser {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        if (Auth::check() && \App\User::isUser()) {

            return $next($request);
        }
      // return redirect('login');
        return response()->view('auth.login');
       // return view('auth.login');
    }

}
