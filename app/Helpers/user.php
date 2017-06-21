<?php
function getUserTotalScore($userid)
{
    $consumed = \App\UserPointsConsumed::where('user_id', $userid)->sum('points_consumed');
    $scored = \App\UserPointsScored::where('user_id', $userid)->sum('points_scored');
    if ($scored - $consumed >= 0) {
        return $scored - $consumed;
    }
    return 0;
}

function has_user_team($user_id)
{
    $userteam = \App\UserTeam::where('user_id', $user_id)->where('tournament_id', 2)->first();
    ///dd($userteam);
    if ($userteam == NULL) {
        return FALSE;
    } else {
        return TRUE;
    }
}

function has_user_team_ipl($user_id)
{
    $userteam = \App\UserTeam::where('user_id', $user_id)->where('tournament_id', 1)->first();
    ///dd($userteam);
    if ($userteam == NULL) {
        return FALSE;
    } else {
        return TRUE;
    }
}
function userTeamPlayerCount($team_id){
   return \App\UserTeam::find($team_id)->user_team_player()->count();
}
function checksingledigit($int){
    if($int>9){
        return false;
    }else{
        return true;
    }
}

function getPlayerNoInTeam($userid, $teamid, $roleid)
{

    $count = DB::select("SELECT COUNT(pr.game_role_id) as total FROM `user_team_players` utp
    INNER JOIN player_roles pr ON pr.player_id = utp.player_id
    INNER JOIN user_teams ut ON ut.id = utp.team_id
    where utp.team_id = '$teamid' AND pr.game_role_id = '$roleid' AND ut.user_id = '$userid'");
    return ($count[0]->total);

    // returns no of players in user team against a specific role i.e no of batsmen
    $x = \App\UserTeam::where('user_id', $userid)
        ->where('id', $teamid)
        ->with('user_team_player.player_roles')->firstOrFail()->toArray();
//        $x = \App\UserTeam::where('user_id', $userid)
//           ->where('tournament_id', $tournament_id)
//          ->with('user_team_player.player_roles')->firstOrFail()->toArray();

    $i = 0;
    foreach ($x['user_team_player'] as $row) {
        if ($row['player_roles'][0]['id'] == $roleid)
            $i++;
    }
    return $i;
}

function get_individual_player_score($tournament_id, $teamId, $playerid)
{


//      $data['user_teams'] = \App\UserTeam::where('user_id', 46)->where('tournament_id', $tournament_id)
//          ->get()
//          ->toArray();
    //dd($tournament_id);die;
    $data['user_teams'] = \App\UserTeam::where('user_id', \Auth::id())->where('tournament_id', 2)
        ->get()
        ->toArray();
    //dd($data['user_teams'][0]['joined_from_match_date']);
    $matcheIdsAfterThisTeamMade = \App\Match::select('id')->where('start_date', '>', $data['user_teams'][0]['joined_from_match_date'])
        ->get()->toArray();
    // dd($matcheIdsAfterThisTeamMade);
    if (!empty($matcheIdsAfterThisTeamMade)) {
        $matcheIdsAfterThisTeamMade = array_column($matcheIdsAfterThisTeamMade, 'id');
        //  $matcheIdsAfterThisTeamMade = [1];
    }
    $data['user_team_players'] = \App\Player::whereHas('player_teams', function ($query) use ($teamId) {
        $query->where('team_id', $teamId);
    })->get()->toArray();
    $userTeamPlayerIds = [0];
    if (!empty($data['user_team_players'])) {
        $userTeamPlayerIds = array_column($data['user_team_players'], 'id');
    }
    // $matcheIdsAfterThisTeamMade=[1,2,3,4,5,6,7,8,9,10];
    // dd($matcheIdsAfterThisTeamMade);
    //  $userTeamPlayerIds=[1,2,3,4,5,6,7,8,9,10];
    //dd($userTeamPlayerIds);
    $data['team_score'] = \App\Player::whereIn('id', $userTeamPlayerIds)->with(['player_roles', 'player_matches',
        'player_gameTerm_score' => function ($query) use ($matcheIdsAfterThisTeamMade) {
            $query->whereIn('match_id', $matcheIdsAfterThisTeamMade);
        },
        'player_gameTerm_score.game_terms' => function ($query) {
            $query->select('name', 'id');
        },
        'player_gameTerm_score.points_devision_tournament' => function ($query) use ($matcheIdsAfterThisTeamMade, $tournament_id) {
            $query->where('tournament_id', $tournament_id);

        }
    ])->get()->toArray();


    //dd($data);
    //dd($data['team_score']);
//       debugArr($data['team_score']);
//       die;
    $x = \App\UserTeam::where('user_id', \Auth::id())->with('user_team_player.player_matches')->get();
    $data['matches'] = \App\Match::all()->where('tournament_id', 2)
        ->where('matches', '>=', date("Y-m-d"))
        ->sortByDesc("start_date")->toArray();
    $data['userprofileinfo'] = \App\User::findOrFail(\Auth::id());
    $team_score = $data['team_score'];
    // dd($team_score);

    $playertotal = 0;
    foreach ($team_score as $row) {

        if ($row['id'] == $playerid) {

            foreach ($row['player_game_term_score'] as $termscore) {

                foreach ($termscore['points_devision_tournament'] as $points) {

                    if ($points['qty_from'] == $points['qty_to']) {
                        //   echo "yes";
                        //     echo $points['points'] * $termscore['player_term_count'];
                        $playertotal += $points['points'] * $termscore['player_term_count'];

                    } else {
                        if (($points['qty_from'] <= $termscore['player_term_count']) && ($points['qty_to'] >= $termscore['player_term_count'])) {
                            //  echo $points['qty_from']." ". $termscore['player_term_count']." ".$points['qty_to']."<br>";


                            $playertotal += $points['points'];
                        }
                    }


                }

            }


        }

    }//end
    return $playertotal;
//      dd($playertotal);

}

function getUserTeamPlayersCount($team_id)
{
    return \App\UserTeam::find($team_id)->user_team_player()->count();
}

function ordinal_suffix($num)
{
    $num = $num % 100; // protect against large numbers
    if ($num < 11 || $num > 13) {
        switch ($num % 10) {
            case 1:
                return 'st';
            case 2:
                return 'nd';
            case 3:
                return 'rd';
        }
    }
    return 'th';
}
function send_user_mail($email, $name)
{
    Mail::to($email)->send(new \App\Mail\MyMail($name));
}

