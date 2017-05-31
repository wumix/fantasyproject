<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Socialite\Contracts\User as ProviderUser;
use Laravel\Socialite\Facades\Socialite;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'profile_pic', 'password', 'user_type', 'provider_user_id', 'remember_token', 'provider','last_login'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Type casting of db columns
     * @var type
     */
    protected $casts = [
        'user_type' => 'int',
    ];

    /**
     * Check if this is an admin
     * @return type
     */
    public static function isAdmin() {
        return (\Auth::user()->user_type == 0) ? true : false;
    }

    /**
     * Check if this is an blogger
     * @return type
     */
    public static function isBlogger() {
        return (\Auth::user()->user_type == 0 || \Auth::user()->user_type == 2) ? true : false;
    }

    public static function isUser() {
        return (\Auth::user()->user_type == 1) ? true : false;
    }
    public function comments()
    {
        return $this->hasMany('\App\Comment');
    }

    /**
     * Get user from social media logins
     * @param \App\ProviderUser $providerUser
     * @return type
     */
    public function leaderboard() {

        return $this->hasMany('App\LeaderBoard', 'user_id', 'id');
    }

    public function createOrGetUser(ProviderUser $providerUser, $socialProvider) {
        //to handle facebook email not found exception
      // if(empty($providerUser->getEmail()))   dd('couldnt get your email') ;
        $account = User::where('email', $providerUser->getEmail())->first();
        if ($account) {
            return $account;
        } else {

            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = User::create([
                            'email' => $providerUser->getEmail(),
                            'name' => $providerUser->getName(),
                            'user_type' => '1',
                            'profile_pic' => $providerUser->getAvatar(),
                            'provider_user_id' => $providerUser->getId(),
                            'provider' => $socialProvider,
                            'password' => bcrypt(str_random(8)),
                            'remember_token' => bcrypt(str_random(16))

                ]);
                //adding user registration points
                $userActionKey = 'user_signup';
                $actionPoints = \App\UserAction::getPointsByKey($userActionKey);
                //Saving user points scored
                $objPointsScored = new \App\UserPointsScored;
                $objPointsScored->user_id = $user->id;
                $objPointsScored->action_key = $userActionKey;
                $objPointsScored->points_scored = $actionPoints;
                $objPointsScored->save();
            }
            return $user;
        }
    }

}
