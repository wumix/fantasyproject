<?php
function membershipFeaturePoints($userid,$feature)
{
    $user_memberhsip = \App\User::where('id', $userid)->with(['membership' => function ($query) {
        $query->where('user_memberships.is_expired', 0);
    }, 'membership.membership_details' => function ($query) {
        // $query->select('feature');
    }])->first()->toArray();
    //dd($user_memberhsip);
    // $points=30;
    foreach ($user_memberhsip['membership'][0]['membership_details'] as $membership) {
        if ($membership['feature'] == $feature) {
            $points = $membership['value'];
        }

    }
    return $points;
}
function challengeTeamCompleteInChallenge($user_id,$challenge_id){
    $is_complete=\App\UserChallengeTeamStatus::where('user_id', $user_id)->
    where('challenge_id', $challenge_id)->first()->is_complete;
    if($is_complete==1){
        return true;
    }else{
        return false;
    }
}
function userScoreInChallenge($user_id,$challenge_id){
   //return \App\UserChallengePlayerScore::where('user_id',$user_id,$challenge_id)->get()->count();
    return DB::table('user_challenge_player_score')->where('user_id',$user_id,$challenge_id)->sum('score');
}
function userPointsAdditionInTournament($userid,$feature)
{
//    $userActionKey = 'membership_points';
    $actionPoints =membershipFeaturePoints($userid,$feature);
    $objTourmament = \App\Tournament::all()->sortBy("start_date")->where('end_date', '>', getGmtTime());

    $tournaments_list = $objTourmament->toArray();

    foreach ($tournaments_list as $row) {
        $array = array(
            [
                'tournament_id' => $row['id'],
                'action_key' =>$feature,
                'user_id' => $userid,
                'points_scored' => $actionPoints
            ]
        );
        \App\UserPointsScored::insert($array);
    }

}

?>