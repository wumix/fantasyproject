<?php

namespace App\Http\Controllers\user;

use App\TournamentRoleLimit;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChallengeController extends Controller
{
    //
    protected $userChallenge;

    public function __construct()
    {
        $this->userChallenge = new \App\UserChallenge;
    }

    public function index(Request $request)
    {
        $searchParam = $request->get('searchParam');

        $data['tournament_list'] = \App\Tournament::all()->sortBy("start_date")->where('end_date', '>', getGmtTime());

        $data['users'] = User::paginate(9);

        if (strlen($searchParam) > 2) {
            $data['users'] = User::where('email', 'like', '%' . $searchParam . '%')
                ->orWhere('name', 'like', '%' . $searchParam . '%')
                ->paginate(9);
        }
        $data['searchParam'] = $searchParam;
        return view('user.challenge.challenge', $data);
    }

    public function sendChallenge(Request $request)
    {

        $request->request->remove('_token');
        $match_id = $request->request->add(['match_id' => 96]);

        $match_id = 96;
        $data = $this->userChallenge->where(['user_1_id' => $request->user_1_id, 'user_2_id' => $request->user_2_id])->first();
        // if (empty($data)) {
        if (1) {
            $this->userChallenge->fill($request->all());
            $this->userChallenge->save();
            $sender = \App\User::find($request->user_1_id);
            $reciever = $id = \App\User::find($request->user_2_id);

            \App\UserChallengeTeamStatus::insert(
                [
                    'user_id' => $request->user_1_id,
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
            return redirect()->route('addChallengeTeam',
                [
                    'match_id' => $match_id,
                    'challlenge_id' => $this->userChallenge->id
                ]);

        } else {
            return redirect()->back()
                ->with('status', 'You have already challenged this user');
        }


    }


    public function showUserChallenges($id)

    {
        $r = $this->userChallenge->where('user_2_id', \Auth::id())->get()->toArray();
        //$r=$this->userChallenge->find('12')->get()->toArray();
        dd($r);
    }

    public function addChallengeTeam($match_id, $challenge_id)
    {
        //dnt forget to reciverve challenge id here

//        $match_id = 96;
//        $challenge_id = 2;
        $data['challenge_id'] = $challenge_id;
//        $userteamtomplete = \App\UserChallengeTeamStatus::where('user_id', \Auth::id())->
//        where('challenge_id', $challenge_id)->first()->is_complete;
        if (challengeTeamCompleteInChallenge(\Auth::id(), $challenge_id)) {
            return redirect()->route('UserDashboard')->with('status', 'Compeleted');;


        }
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
//     debugArr( $data['roles']);
//        die;
        $data['team_id'] = 5;
        return view('user.challenge.user_challenge_team', $data);
    }

    public function playerRoleCountInChallenge($chalelnge_players, $player_role_id)
    {
        $count = 0;
        foreach ($chalelnge_players['challenge_players'] as $players) {
            if ($players['player_roles'][0]['id'] == $player_role_id) {
                $count++;
            }
        }
        return $count;
    }

    public function confirmChallengeTeam(Request $request, $challenge_id)
    {
        $challenge = \App\UserChallengeTeamStatus::where('user_id', \Auth::id())->where('challenge_id', $challenge_id);
        $challenge->update(['is_complete' => 1]);
        $challenge = \App\UserChallenge::find($challenge_id)->first();
        if (\Auth::id() == $challenge->user_1_id) {
            $sender = \App\User::find($challenge->user_1_id);
            $reciever = $id = \App\User::find($challenge->user_2_id);
        } else {
            $sender = \App\User::find($challenge->user_2_id);
            $reciever = $id = \App\User::find($challenge->user_1_id);
        }

        \Mail::to($reciever->email)->send(new \App\Mail\ChallengeTeamCompleted($sender->name, $reciever->name));
        return redirect()->route('UserDashboard')->with(['status', 'confirm']);

    }

    public function getTeamRoles(Request $request)
    {
        $challenge_id = $request->challenge_id;
        $user_ids = \Auth::id();
        $chalelnge_players = \App\UserChallenge::where('id', $challenge_id)
            ->with([
                'challenge_players.player_roles',
                'challenge_players' => function ($q) use ($user_ids) {
                    $q->where('user_id', $user_ids);

                }])->first()->toArray();

        $objResponse['success'] = true;
        $objResponse['msg'] = "Player Added successfully";
        $objResponse['batsmen'] = $batsmen = $this->playerRoleCountInChallenge($chalelnge_players, 5);
        $objResponse['bowler'] = $bowler = $this->playerRoleCountInChallenge($chalelnge_players, 6);
        $objResponse['wicketkeeper'] = $wicketkeeper = $this->playerRoleCountInChallenge($chalelnge_players, 8);
        $objResponse['allrounder'] = $allrounder = $this->playerRoleCountInChallenge($chalelnge_players, 7);
        $teamcount = count(($chalelnge_players['challenge_players']));
        if ($teamcount == 11) {
            $objResponse['success'] = true;
            $objResponse['teamsuccess'] = true;
            $objResponse['challenge_id'] = $challenge_id;
            //joined_from_match_date -- I guess update team here
            return response()->json($objResponse);


        }
        return response()->json($objResponse);
    }

    public function addPlayerTochallengeTeam(Request $request)
    {
        $challenge_id = $request->challenge_id;
        $player_id = $request->player_id;
        $tournamnet_id = $request->tournamnet_id;
        $player_role_id = $request->role_id; //i.e batsmen has role id=7,bowler 5 etc
        $user_ids = \Auth::id();
        $chalelnge_players = \App\UserChallenge::where('id', $challenge_id)
            ->with([
                'challenge_players.player_roles',
                'challenge_players' => function ($q) use ($user_ids) {
                    $q->where('user_id', $user_ids);

                }])->first()->toArray();
//        dd($chalelnge_players);
        //return count of bowlers,or batsmen depending on role id
        $teamrolecount = $this->playerRoleCountInChallenge($chalelnge_players, $player_role_id);
        /* return max limit against a specific role*/
        $role_imit = \App\TournamentRoleLimit::where(['tournament_id' => $tournamnet_id, 'player_role_id' => $player_role_id])->first()->max_limit;
        $teamcount = count(($chalelnge_players['challenge_players']));
        $total = 0;


        if ($teamrolecount < $role_imit) {
            $player = \App\UserChallenge::find($challenge_id);
            $player->challenge_players()->attach([$player_id => ['user_id' => \Auth::id()]]);
            $user_ids = \Auth::id();
            $chalelnge_players = \App\UserChallenge::where('id', $challenge_id)
                ->with([
                    'challenge_players.player_roles',
                    'challenge_players' => function ($q) use ($user_ids) {
                        $q->where('user_id', $user_ids);

                    }])->first()->toArray();
            $objResponse['success'] = true;
            $objResponse['msg'] = "Player Added successfully";
            $total += $objResponse['batsmen'] = $this->playerRoleCountInChallenge($chalelnge_players, 5);
            $total += $objResponse['bowler'] = $this->playerRoleCountInChallenge($chalelnge_players, 6);
            $total += $objResponse['wicketkeeper'] = $this->playerRoleCountInChallenge($chalelnge_players, 8);
            $total += $objResponse['allrounder'] = $this->playerRoleCountInChallenge($chalelnge_players, 7);
            $teamcount = $total;
        } else {
            $objResponse['success'] = false;
            $objResponse['msg'] = "You can't have more than " . $role_imit . " players in this category";
        }

        if ($teamcount == 11) {
            $objResponse['success'] = true;
            $objResponse['teamsuccess'] = true;
            $objResponse['challenge_id'] = $challenge_id;
            //joined_from_match_date -- I guess update team here
            return response()->json($objResponse);


        }
        return response()->json($objResponse);
    }

    function deletePlayerTochallengeTeam(Request $request)
    {
        $challenge_id = $request->challenge_id;
        $player_id = $request->player_id;
        $player = \App\UserChallenge::find($challenge_id);
        $player->challenge_players()->detach($player_id);
        $objResponse['success'] = true;
        $objResponse['msg'] = "Player deleted successfully";
        return response()->json($objResponse);
    }


    function acceptChallenge($challenge_id, $match_id)
    {


        $challenge = $this->userChallenge->findOrFail($challenge_id);
        $challenge->status = 1;
        $challenge->save();

        return redirect()->route('addChallengeTeam', ['match_id' => $match_id, 'challenge_id' => $challenge_id]);


    }


    function checkWinner($challenge_id)
    {


        $challenge = $this->userChallenge->findOrFail($challenge_id)->first()->toArray();
        $user_1_id = $challenge['user_1_id'];
        $user_2_id = $challenge['user_2_id'];
        $tournament_id = $challenge['tournament_id'];
//        $data['upcommingTour'] = \App\Tournament::all()->sortBy("start_date")->
//        where('start_date', '>=', getGmtTime());
        \App\Leaderboard::where('user_id', $user_1_id)->where('user_id', $user_2_id);


        dd($user_1_id);
        getGmtTime();

    }


}
