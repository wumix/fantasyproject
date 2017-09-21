<?php

namespace App\Http\Controllers\LeaderBoard;

use App\Leaderboard;
use App\UserTeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeaderboardController extends Controller
{
    function index($tournament_id)
    {
        $userid = \App\User::all()->toArray();
        $userteams = [];

        foreach ($userid as $userids) {

            $userteam = \App\UserTeam::where('user_id', $userids['id'])
                ->where('tournament_id', $tournament_id)
                ->first();


            if (!empty($userteam)) {
                $userteams[] = $userteam->toArray();
            }
        }

//dd($userteams);
        \App\Leaderboard::where('tournament_id', $tournament_id)->delete();


        $leaderboard = new Leaderboard();
 //dd($userteams);
        foreach ($userteams as $k) {
            //   echo $k['id']." ".$k['user_id']." ".$k['name'];
            $leaderboard = new Leaderboard();

            $score = $this->get_user_team_score($tournament_id, $k['id'], $k['user_id']);

            $leaderboard->tournament_id = $tournament_id;
            $leaderboard->user_id = $k['user_id'];
            $leaderboard->team_id = $k['id'];
            $leaderboard->score = $score;
            $leaderboard->save();

        }
        $data['leaders'] = \App\Leaderboard::with('user', 'user_team')
            ->take(3)->orderBy('score', 'DESC')->get()->toArray();


        $this->sendleaderboardMails($data['leaders']);




    }

    function sendleaderboardMails($data = [])
    {
        foreach ($data as $user) {
            send_user_mail($user['user']['email'], $user['user']['name']);
        }


    }


    function get_user_team_score($tournament_id, $teamId, $userid)
    {


        $data['user_teams'] = \App\UserTeam::where('user_id', $userid)
            ->where('tournament_id', $tournament_id)
            ->get()
            ->toArray();
        if (empty($data['user_teams'][0]['joined_from_match_date'])) {
            return 0;
        }

        $matcheIdsAfterThisTeamMade = \App\Match::select('id')
            ->where('start_date', '>=', $data['user_teams'][0]['joined_from_match_date'])
            ->get()->toArray();
        //  dd($matcheIdsAfterThisTeamMade);

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
        //dd($matcheIdsAfterThisTeamMade);
        //  $userTeamPlayerIds=[1,2,3,4,5,6,7,8,9,10];
       // dd($userTeamPlayerIds);
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
        $data['matches'] = \App\Match::all()->where('tournament_id', $tournament_id)
            ->where('matches', '>=', date("Y-m-d"))
            ->sortByDesc("start_date")->toArray();
        $data['userprofileinfo'] = \App\User::findOrFail(\Auth::id());
        $team_score = $data['team_score'];
        $user_team_player_transfer = \App\UserTeam::where('id', $teamId)
            ->with('user_team_player_transfers.player_transfer')
            ->get();
        $user_team_player_transfer = $user_team_player_transfer->toArray();
        $user_team_player_transfer = $user_team_player_transfer[0];
        //dd($team_score);

        $teamtotal = 0;
        foreach ($team_score as $row) {

            $playertotal = 0;
            $flag = 0;
            $playertransferedname = "";
            $playertransferedpic = "";
            $playertransferedscore = 0;
            $playerinscore = 0;
            foreach ($user_team_player_transfer['user_team_player_transfers'] as $transfer) {
                if ($transfer['pivot']['player_in_id'] == $row['id']) {
                    $playertransferedpic = $transfer['profile_pic'];
                    $playertransferedname = $transfer['name'];
                    $playertransferedscore = $transfer['pivot']['player_out_score'];
                    $flag = 1;
                    // $playertotal+=$transfer['pivot']['player_out_score'];
                    $teamtotal += $transfer['pivot']['player_out_score'];
                    $teamtotal -= $transfer['pivot']['player_in_score'];
                    $playerinscore -= $transfer['pivot']['player_in_score'];
                }
            }

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


            $teamtotal += $playertotal;
        }

        return $teamtotal;
    }

}
