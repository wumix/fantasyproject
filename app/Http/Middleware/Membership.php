<?php

namespace App\Http\Middleware;

use Closure;
use function foo\func;
use Illuminate\Support\Facades\Auth;

class Membership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
//        $userActionKey = 'user_signup';
//        $actionPoints = \App\UserAction::getPointsByKey($userActionKey);
//        $objTourmament = \App\Tournament::all()->sortBy("start_date")->where('end_date', '>', getGmtTime());
//        dd($objTourmament);

        if (Auth::check() && \App\User::is_member(Auth::id())) {
            return $next($request);
        }
        $data['membership_plans'] = \App\Membership::with(['membership_details'=>function($query){
            $query->orderBY('feature','asc');
        }])->get()->toArray();
        return response()->view('user.memberships.home', $data);


    }
}
