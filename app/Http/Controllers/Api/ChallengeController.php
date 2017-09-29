<?php

namespace App\Http\Controllers\Api;

use App\UserChallenge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\User;

class ChallengeController extends Controller
{
    protected $userChallenge;

    function __construct()
    {
        $this->userChallenge = new \App\UserChallenge;
    }

    function index()
    {

    }

    function showChallenges()
    {
        $user_id = 434;
        $sent_challenges = \App\UserChallenge::where(['user_1_id' => $user_id])->with(['user_by','match'=>function($q){
            $q->select('id','name');
        }])->get()->toArray();
        $data['accepted_challenges'] = $accepted_challenges = \App\User::where(['id' => $user_id])->with(
            [
                'challenges.match'=>function ($query) {
                     $query->select('id','name');
                },
                'challenges' => function ($query) {
            // $query->where('status', 1);
        }, 'challenges.user'])->get()->toArray();
        //  return response()->json($sent_challenges);
        // $data['sent_challenges']=[];


        foreach ($sent_challenges as &$challenge) {
            $challenge['user'] = $challenge['user_by'];
            unset($challenge['user_by']);

        }
        $data['sent_challenges'] = $sent_challenges;
        $data['accepted_challenges'] = $accepted_challenges[0]['challenges'];
        return response()->json($data);
    }

    function sendChallenge(Request $request)
    {

        $match_id = $request->match_id;
        $user_1_id = \Auth::Id();
        $request->request->add(['user_1_id' => $user_1_id]);
        if (empty($match_id)) {
            $data['status'] = false;
            $data['message'] = "Please select a match";

        }
        $data = $this->userChallenge->where(['user_1_id' => $user_1_id, 'user_2_id' => $request->user_2_id])->first();
        // if (empty($data)) {
        if (1) {
            $this->userChallenge->fill($request->all());
            $this->userChallenge->save();
            $sender = \App\User::find($request->user_1_id);
            $reciever = $id = \App\User::find($request->user_2_id);

            \App\UserChallengeTeamStatus::insert(
                [
                    'user_id' => $user_1_id,
                    'challenge_id' => $this->userChallenge->id,
                    'is_complete' => 0,
                ]);
            \App\UserChallengeTeamStatus::insert(
                [
                    'user_id' => $request->user_2_id,
                    'challenge_id' => $this->userChallenge->id,
                    'is_complete' => 0,
                ]);
            \Mail::to($reciever->email)->send(new \App\Mail\Challenge($sender->name, $reciever->name));
            $data['status'] = true;
            $data['message'] = "Challenge sent successfully";
            return response()->json($data);

        } else {
            $data['status'] = true;
            $data['message'] = "";
            return redirect()->back()
                ->with('status', 'You have already challenged this user');
        }
    }

    function challengeTeam(Request $request)
    {

        $challenge_id = $request->challenge_id;
        $data['challenge_id'] = $challenge_id;

        $match_id = \App\UserChallenge::where('id', $challenge_id)->first()->match_id;

//        if (challengeTeamCompleteInChallenge(\Auth::id(), $challenge_id)) {
//            return redirect()->route('UserDashboard')->with('status', 'Compeleted');
//        }
        $tournamnet_id = \App\Match::where('id', $match_id)->first()->tournament_id;

        $data['tournamnet_id'] = $tournamnet_id;
        $user_id = \Auth::id();

        $player = \App\UserChallenge::where('id', $challenge_id)->with(
            ['challenge_players' => function ($q) use ($user_id) {
                $q->where('user_id', $user_id);
            }
            ])->first();
        if (empty($player)) {
            $player = [];
        } else {
            $player = $player->toArray();
        }

        $selectedPlayers = [];
        if (!empty($player['challenge_players'])) {
            $selectedPlayers = array_column($player['challenge_players'], 'id');
        }

        $data['user_team_player'] = $player;
        $data['roles'] = \App\GameRole::where('game_id', 1)
            ->with([
                'players.player_matches' => function ($query) use ($match_id) {
                    return $query->where('matches.id', $match_id);
                }, 'players.player_roles',
                'players' => function ($q) use ($selectedPlayers) {
                    $q->whereNotIn('players.id', $selectedPlayers);
                }, 'players.player_actual_teams' => function ($query) use ($tournamnet_id) {
                    $query->where('tournament_id', $tournamnet_id);
                }
            ])
            ->get()
            ->toArray();

        return response()->json($data['roles']);


        $data['team_id'] = 5;
    }

}
