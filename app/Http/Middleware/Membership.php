<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Membership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {

        if (Auth::check() &&  \App\User::is_member(Auth::id())) {
            return $next($request);
        }
        $data['membership_plans'] = \App\Membership::all();
        return response()->view('user.memberships.home', $data);


    }
}
