<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    protected $table = 'players';
    protected $fillable = [
        'name', 'game_id', 'profile_pic', 'created_at', 'updated_at'
    ];



    public function player_games()
    {
        return $this->belongsTo('App\Game', 'game_id');
    }
    public function player_matches(){
        return $this->belongsToMany('App\Match', 'player_matches','player_id', 'match_id');
    }

    public static function get_player($palyer_id)
    {
        return Player::findOrFail($palyer_id);
    }

    public function player_roles()
    {
        return $this->belongsToMany('App\GameRole', 'player_roles', 'player_id');
    }

    public function player_tournaments()
    {
        return $this->belongsToMany('App\Tournament', 'player_tournaments')->withPivot('player_price');
    }



    public function player_teams()
    {
        // return $this->belongsToMany('App\Player', 'user_team_players','team_id');
        return $this->belongsToMany('App\UserTeam', 'user_team_players', 'player_id');
    }

}
