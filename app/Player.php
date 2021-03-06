<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    protected $table = 'players';
    protected $fillable = [
        'name', 'game_id','cricapi_pid' ,'profile_pic', 'created_at', 'updated_at'
    ];

    public function player_games()
    {
        return $this->belongsTo('App\Game', 'game_id');
    }

    public function player_transfer()
    {
        return $this->hasMany('App\PlayerTransfer', 'player_in_id', 'id');
    }

    public function player_matches()
    {
        return $this->belongsToMany(Match::class, 'player_matches', 'player_id', 'match_id');
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

    /**
     * Player team in IPL on actual tournament
     * @return type
     */
    public function player_actual_teams()
    {
        return $this->belongsToMany('App\Team');
    }

    /**
     * Users team
     * @return type
     */
    public function player_teams()
    {
        return $this->belongsToMany('App\UserTeam', 'user_team_players', 'player_id', 'team_id');
    }

    public function player_gameTerm_score()
    {
        return $this->hasMany(MatchPlayerScore::class, 'player_id');
    }
    public function player_match_stats(){
        return $this->hasMany(PlayerMatchStats::class, 'player_id');
    }

    public function game_types()
    {
        return $this->belongsToMany('App\GameType', 'game_type_points', 'player_id', 'game_type_id')
            ->withPivot('points')->orderBy('points', 'ASC');
    }
    public function player_stats() {
        return $this->belongsToMany('App\GameTypeStats', 'player_statistics','player_id','game_type_stat_id')->withPivot('stat_points');
    }
    public function playing_category(){
        return $this->belongsToMany('\App\PlayingCategory','player_stats_details','player_id','playing_category');
    }
    public function playing_type(){
        return $this->belongsToMany('\App\Type','player_stats_details','player_id','type_id');
    }
    public static function addPlayer($name,$image=NUll,$pid){
        $player=new \App\Player;
        $player->name=$name;
        $player->profile_pic='cricapi/'.$image;
        $player->cricapi_pid=$pid;
        $player->game_id=1;
        $player->save();
        $player=\App\Player::find($player->id);
        $player->player_roles()->sync('7');
    }

    

}
