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
        $user_id = \Auth::id();
        $sent_challenges = \App\UserChallenge::where(['user_1_id' => $user_id])->with(['user_by', 'match' => function ($q) {
            $q->select('id', 'name');
        }])->get()->toArray();
        foreach ($sent_challenges as &$sent) {
            if (challengeTeamCompleteInChallenge($user_id, $sent['id'])) {
                $sent['is_team_complete'] = "true";
            } else {
                $sent['is_team_complete'] = "false";
            }
            $sent['your_score']=userScoreInChallenge($sent['user_1_id'],$sent['id']);
            $sent['apponent_score']=userScoreInChallenge($sent['user_2_id'],$sent['id']);


        }
        $data['accepted_challenges'] = $accepted_challenges = \App\User::where(['id' => $user_id])->with(
            [
                'challenges.match' => function ($query) {
                    $query->select('id', 'name');
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
        foreach ($accepted_challenges[0]['challenges'] as &$c) {
            if (challengeTeamCompleteInChallenge($user_id, $c['id'])) {
                $c['is_team_complete'] = "true";
            } else {
                $c['is_team_complete'] = "false";
            }
            $c['your_score']=userScoreInChallenge($c['user_2_id'],$c['id']);
            $c['apponent_score']=userScoreInChallenge($c['user_1_id'],$c['id']);

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
        //  $data = $this->userChallenge->where(['user_1_id' => $user_1_id, 'user_2_id' => $request->user_2_id])->first();
        // if (empty($data)) {
        $this->userChallenge->where(['user_1_id' => $user_1_id, 'user_2_id' => $request->user_2_id])->first();
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
            $data['id'] = $this->userChallenge->id;
            return response()->json($data);

        } else {
            $data['status'] = true;
            $data['message'] = "";
            return redirect()->back()
                ->with('status', 'You have already challenged this user');
        }
    }

    function getMatchId($challenge_id)
    {
        return \App\UserChallenge::where('id', $challenge_id)->first()->match_id;
    }

    function tournamentId($match_id)
    {
        return \App\Match::where('id', $match_id)->first()->tournament_id;
    }

    function challengeTeam(Request $request)
    {

        $challenge_id = $request->challenge_id;
        $data['challenge_id'] = $challenge_id;

        $match_id = $this->getMatchId($challenge_id);
        $tournamnet_id = $this->tournamentId($match_id);


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
        $roles = \App\GameRole::where('game_id', 1)
            ->with([
                'players.player_matches' => function ($query) use ($match_id) {
                    $query->where('player_matches.match_id', $match_id);
                }, 'players.player_roles',
                'players.player_actual_teams' => function ($query) use ($tournamnet_id) {
                    $query->where('tournament_id', $tournamnet_id);
                }

            ])
            ->get()
            ->toArray();



        $k = [];
        foreach ($roles as &$role) {
            foreach ($role['players'] as $key => &$player) {


                if (empty($player['player_matches'])) {

                    continue;

                } else {
                    if (in_array($player['id'], $selectedPlayers)) {
                        $player['in_team'] = "true";
                    } else {
                        $player['in_team'] = "false";
                    }
                    $player['role_id'] = (string)$player['player_roles'][0]['id'];
                    $player['team_name'] = $player['player_actual_teams'][0]['name'];
                    unset($player['player_roles']);
                    unset($player['player_actual_teams']);
                    unset($player['pivot']);
                    unset($player['player_matches']);
                    $player['profile_pic'] = getUploadsPath($player['profile_pic']);
                    $k[strtolower(str_replace(' ', '_', $role['name']))][] = $player;


                }

            }
        }
        $chalelnge_players = \App\UserChallenge::where('id', $challenge_id)
            ->with([
                'challenge_players.player_roles',
                'challenge_players' => function ($q) use ($user_id) {
                    $q->where('user_id', $user_id);

                }])->first()->toArray();
        $k['bat_count'] = (string)$batsmen = $this->playerRoleCountInChallenge($chalelnge_players, 5);
        $k['bowl_count'] = (string)$bowler = $this->playerRoleCountInChallenge($chalelnge_players, 6);
        $k['wicket_count'] = (string)$wicketkeeper = $this->playerRoleCountInChallenge($chalelnge_players, 8);
        $k['allround_count'] = (string)$allrounder = $this->playerRoleCountInChallenge($chalelnge_players, 7);
        $k['team_count'] = (string)$batsmen + $bowler + $wicketkeeper + $allrounder;
        return response()->json($k);


    }

    public function deltePlayerFormChallenge(Request $request)
    {
        $challenge_id = $request->challenge_id;
        $player_id = $request->player_id;
        $player_role_id = $request->role_id;
        $player = \App\UserChallenge::find($challenge_id);
        $player->challenge_players()->detach($player_id);
        $match_id = $this->getMatchId($challenge_id);
        $tournamnet_id = $this->tournamentId($match_id);



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
        $roles = \App\GameRole::where('game_id', 1)
            ->with([
                'players.player_matches' => function ($query) use ($match_id) {
                    $query->where('player_matches.match_id', $match_id);
                }, 'players.player_roles',
                'players.player_actual_teams' => function ($query) use ($tournamnet_id) {
                    $query->where('tournament_id', $tournamnet_id);
                }

            ])
            ->get()
            ->toArray();


        //return response()->json($roles);
        //dd($roles);


        $k = [];
        foreach ($roles as &$role) {
            foreach ($role['players'] as $key => &$player) {


                if (empty($player['player_matches'])) {

                    continue;

                } else {
                    if (in_array($player['id'], $selectedPlayers)) {
                        $player['in_team'] = "true";
                    } else {
                        $player['in_team'] = "false";
                    }
                    $player['role_id'] = (string)$player['player_roles'][0]['id'];
                    $player['team_name'] = $player['player_actual_teams'][0]['name'];
                    unset($player['player_roles']);
                    unset($player['player_actual_teams']);
                    unset($player['pivot']);
                    unset($player['player_matches']);
                    $player['profile_pic'] = getUploadsPath($player['profile_pic']);
                    $k[strtolower(str_replace(' ', '_', $role['name']))][] = $player;


                }

            }
        }
        $chalelnge_players = \App\UserChallenge::where('id', $challenge_id)
            ->with([
                'challenge_players.player_roles',
                'challenge_players' => function ($q) use ($user_id) {
                    $q->where('user_id', $user_id);

                }])->first()->toArray();
        $k['bat_count'] = (string)$batsmen = $this->playerRoleCountInChallenge($chalelnge_players, 5);
        $k['bowl_count'] = (string)$bowler = $this->playerRoleCountInChallenge($chalelnge_players, 6);
        $k['wicket_count'] = (string)$wicketkeeper = $this->playerRoleCountInChallenge($chalelnge_players, 8);
        $k['allround_count'] = (string)$allrounder = $this->playerRoleCountInChallenge($chalelnge_players, 7);
        $k['team_count'] = (string)$batsmen + $bowler + $wicketkeeper + $allrounder;
        return response()->json($k);

    }

    public function addPlayerTochallengeTeam(Request $request)
    {

        $challenge_id = $request->challenge_id;
        $player_id = $request->player_id;
        $player_role_id = $request->role_id; //i.e batsmen has role id=7,bowler 5 etc
        $match_id = $this->getMatchId($challenge_id);
        $tournamnet_id = $this->tournamentId($match_id);
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
            $player->challenge_players()->attach([$player_id => ['user_id' => $user_ids]]);
            $user_ids = \Auth::id();
            $chalelnge_players = \App\UserChallenge::where('id', $challenge_id)
                ->with([
                    'challenge_players.player_roles',
                    'challenge_players' => function ($q) use ($user_ids) {
                        $q->where('user_id', $user_ids);

                    }])->first()->toArray();
            $objResponse['success'] = true;
            $objResponse['msg'] = "Player Added successfully";
            $total += $objResponse['batsmen'] = (string)$this->playerRoleCountInChallenge($chalelnge_players, 5);
            $total += $objResponse['bowler'] = (string)$this->playerRoleCountInChallenge($chalelnge_players, 6);
            $total += $objResponse['wicketkeeper'] = (string)$this->playerRoleCountInChallenge($chalelnge_players, 8);
            $total += $objResponse['allrounder'] = (string)$this->playerRoleCountInChallenge($chalelnge_players, 7);
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
        $challenge_id = $request->challenge_id;
        $data['challenge_id'] = $challenge_id;

        $match_id = $this->getMatchId($challenge_id);
        $tournamnet_id = $this->tournamentId($match_id);
//        if (challengeTeamCompleteInChallenge(\Auth::id(), $challenge_id)) {
//            return redirect()->route('UserDashboard')->with('status', 'Compeleted');
//        }


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
        $roles = \App\GameRole::where('game_id', 1)
            ->with([
                'players.player_matches' => function ($query) use ($match_id) {
                    $query->where('player_matches.match_id', $match_id);
                }, 'players.player_roles',
                'players.player_actual_teams' => function ($query) use ($tournamnet_id) {
                    $query->where('tournament_id', $tournamnet_id);
                }

            ])
            ->get()
            ->toArray();


        //return response()->json($roles);
        //dd($roles);


        $k = [];
        foreach ($roles as &$role) {
            foreach ($role['players'] as $key => &$player) {


                if (empty($player['player_matches'])) {

                    continue;

                } else {
                    if (in_array($player['id'], $selectedPlayers)) {
                        $player['in_team'] = "true";
                    } else {
                        $player['in_team'] = "false";
                    }
                    $player['role_id'] = (string)$player['player_roles'][0]['id'];
                    $player['team_name'] = $player['player_actual_teams'][0]['name'];
                    unset($player['player_roles']);
                    unset($player['player_actual_teams']);
                    unset($player['pivot']);
                    unset($player['player_matches']);
                    $player['profile_pic'] = getUploadsPath($player['profile_pic']);
                    $k[strtolower(str_replace(' ', '_', $role['name']))][] = $player;


                }

            }
        }
        $chalelnge_players = \App\UserChallenge::where('id', $challenge_id)
            ->with([
                'challenge_players.player_roles',
                'challenge_players' => function ($q) use ($user_id) {
                    $q->where('user_id', $user_id);

                }])->first()->toArray();
        $k['bat_count'] = (string)$batsmen = $this->playerRoleCountInChallenge($chalelnge_players, 5);
        $k['bowl_count'] = (string)$bowler = $this->playerRoleCountInChallenge($chalelnge_players, 6);
        $k['wicket_count'] = (string)$wicketkeeper = $this->playerRoleCountInChallenge($chalelnge_players, 8);
        $k['allround_count'] = (string)$allrounder = $this->playerRoleCountInChallenge($chalelnge_players, 7);
        $k['team_count'] = (string)$batsmen + $bowler + $wicketkeeper + $allrounder;
        return response()->json($k);
    }

    public function confirmChallengeTeam(Request $request)
    {
        $challenge_id = $request->challenge_id;
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

}
