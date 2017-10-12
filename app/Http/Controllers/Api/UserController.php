<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \JWTAuth;
use App\User;
use App\User_Type;
use Validator;
use Illuminate\Support\Facades\Auth;
use DB;

class UserController extends Controller
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    function index(){
        $users = \App\User::where('id', '!=', \Auth::id())->
        where('id', '!=', 1)->paginate(9);
        return response()->json($users);
    }

    /**
     * Register
     *
     * Register a new user into our system.
     *
     */
    public function logout()
    {
        if (Auth::logout()) {
            return response()->json(['status' => 'fail', 'error' => 'could_not_create_token'], 500);
        }
    }
    public function search (Request $request){
        $searchParam = $request->get('searchParam');
        if (strlen($searchParam) > 2) {
            $data['users'] = User::where('email', 'like', '%' . $searchParam . '%')
                ->orWhere('name', 'like', '%' . $searchParam . '%')
                ->paginate(9);
        }
        return response()->json( $data['users']);

    }
    function editName(Request $request){
        $user = \App\USER::find(\Auth::id());
        $user->name=$request->name;
        $user->save();
        return response()->json(
            [
                "status" =>"true",
                "message" =>"Name Updated",

            ], 200);
    }
    public function userTournamentTeamsScore(){
        $data['user_scores']=\App\User::where('id',\Auth::id())->with(
            ['leaderboard.tournament.tournament_userteams'=>function($query){
            $query->where('user_id',\Auth::id())->whereNotNull('joined_from_match_date');
        }])->first()->toArray();
      // return response()->json($data['user_scores'], 200);
        $result=[];
        $result['status']=true;
        $result['tournaments_score']=[];
        $result['tournament_teams']=[];
        foreach ( $data['user_scores']['leaderboard'] as $key=>$leaderboard){


            if(!empty($leaderboard['tournament']['tournament_userteams'])){
                $a=['tournament_name'=>$leaderboard['tournament']['name'],'tournament_score'=>(String)$leaderboard['score']];
                $b=['team_name'=>$leaderboard['tournament']
                ['tournament_userteams'][0]['name'],'tournament_id'=>$leaderboard['tournament']['id'],
                    'team_id'=>(String)$leaderboard['team_id']];
                $result['tournaments_score'][]=$a;
                $result['tournament_teams'][]=$b;
            }


        }
        return response()->json($result, 200);
    }
  public function profileUpdate(Request $request){

      $user = \App\USER::find(\Auth::id());
      $files=null;
      if ($request->hasFile('profile_pic')) {

          $files = uploadInputs($request->profile_pic, 'user_profile_pics');
          $user->profile_pic = $files;
      }
      $user->save();
      return response()->json(
          [
              "status" =>getUploadsPath($files),

          ], 200);

}
    public function create(\App\Http\Requests\RegistrationRequest $request)
    {
        //dd($request->all());
        $newUser = $this->user->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'profile_pic'=>getUploadsPath(NULL)

        ]);
        addUSerSignUpPoints($newUser->id);
        if (!$newUser) {
            return response()->json(['failed_to_create_new_user'], 500);
        }
        $user = User::where('id', $newUser->id)->first();

        $success = "";
        try {
            if (!$token = JWTAuth::fromUser($user)) {

                return response()->json(['message' => 'invalid_credentials', 'more_info' => []], 401);
            }else{
                $success = "true";
            }
        } catch (JWTException $e) {
            $success = "flase";
            return response()->json(['message' => 'could_not_create_token', 'more_info' => []], 401);
        }
        return response()->json(compact('success', 'token', 'user'), 200);
    }

    /**
     * Login user
     *
     * Login a user and return his token which will be user with header Bearer {{token}}
     *
     */
    public function authenticate(\App\Http\Requests\LoginRequest $request)
    {
//        dd($request->all());
        // dd($r->only('email'));

        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['message' => 'Invalid Credentials', 'more_info' => []], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => 'Something Went Wrong', 'more_info' => []], 401);
        }
        // all good so return the token
        $message = 'Login Successful';
        $user = \Auth::user();
        $user['profile_pic'] = getUploadsPath($user['profile_pic']);
        $user['referral_key']='http://www.gamithonfantasy.com/signup/?referral_key='.$user['referral_key'];
        return response()->json(compact('message', 'token', 'user'), 200);
    }

    function loginFacebook(Request $request)
    {
        $credentials['email'] = $request->email;
        $user = \App\User::where('email', $request->email)->first();
        if (empty($user)) {
            $user = User::create([
                'email' => $request->email,
                'profile_pic' => $request->profile_pic,
                'name' => $request->name,
                'password' => bcrypt(str_random(8))


            ]);
            addUSerSignUpPoints($user['id']);


        } else {

        }
        try {
            if (!$token = JWTAuth::fromUser($user)) {
                return response()->json(['message' => 'invalid_credentials', 'more_info' => []], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => 'could_not_create_token', 'more_info' => []], 401);
        }
        $user['profile_pic'] = getUploadsPath($user['profile_pic']);
        return response()->json(compact('message', 'token', 'user'), 200);

    }


    /**
     * Change user's password
     *
     * This will use to change the pasword of user.
     *
     */
    function changePassword(\App\Http\Requests\ChangePasswordRequest $request)
    {
        $data = $request->all();
        $user = User::where('email', $data['email'])->get();
        //Changing the password only if is different of null
        if (isset($data['oldPassword']) && !empty($data['oldPassword']) && $data['oldPassword'] !== "" && $data['oldPassword'] !== 'undefined') {
            //checking the old password first
            $check = Auth::guard('web')->attempt([
                'email' => $user[0]->email,
                'password' => $data['oldPassword']
            ]);
            if ($check && isset($data['newPassword']) && !empty($data['newPassword']) && $data['newPassword'] !== "" && $data['newPassword'] !== 'undefined') {
                $user[0]->password = bcrypt($data['newPassword']);
                //Changing the type
                $user[0]->save();
                return json_encode(['status' => true, "message" => "Password changed successfully"], 200); //sending the new token
            } else {
                return response()->json(['status' => false, "message" => 'Wrong password information'], 401);
            }
        }
        return response()->json(['status' => false, "message" => 'Wrong password information'], 401);
    }

    // check if user has team in tournament
    function userHasTeamInTournament($tournament_id, $user_id)
    {
        $userteam = \App\UserTeam::where(['tournament_id' => $tournament_id, 'user_id' => $user_id])->first();
        if (empty($userteam)) {
            return false;
        } else {
            return true;
        }

    }

    function isUniqueTeamName($team_name, $tournament_id)
    {
        $uniqueteam = \App\UserTeam::where(['name' => $team_name, 'tournament_id' => $tournament_id])->get()->toArray();
        if (empty($uniqueteam)) {
            return true;
        } else {
            return false;
        }

    }

    function userTeamPlayers(Request $request)
    {


        $transferflag = 0; // if tournament over hides transfer button
        $team_id = $request->team_id;
        $tournament_id = $request->tournament_id;
        $data['user_teams'] = \App\UserTeam::where('id', $team_id)->get()->toArray();
        //////Error
        if (empty($data['user_teams'])) {
            return abort(404);
        }

        /// End Error
//        $tournament_id = $data['user_teams'][0]['tournament_id'];
        $date_end = \App\Tournament::where('id', $tournament_id)->firstOrFail()->end_date;


        if (getGmtTime() > $date_end) {
            $transferflag = 1;
        }
        $data['transferflag'] = $transferflag;
        $data['user_team_player_transfer'] = \App\UserTeam::where('id', $team_id)
            ->with(['user_team_player_transfers.player_actual_teams' => function ($check) use ($tournament_id) {
                $check->where('tournament_id', $tournament_id);
            }])
            ->get();
        // dd($data['user_team_player_transfer']->toArray());
        // //Get matches after team making
        if ($data['user_teams'][0]['joined_from_match_date'] == null) {
            $dataArray['tournament_id'] = $data['user_teams'][0]['tournament_id'];
            return view('pages.team_incomplete', $dataArray);
        }
        $matcheIdsAfterThisTeamMade = \App\Match::select('id')
            ->where('start_date', '>=', $data['user_teams'][0]['joined_from_match_date'])->where('tournament_id', $tournament_id)
            ->get()->toArray();
        //  echo 'joined date'.$data['user_teams'][0]['joined_from_match_date'].'<br>';
        // echo getGmtTime();
//        dd($matcheIdsAfterThisTeamMade);
        if (!empty($matcheIdsAfterThisTeamMade)) {
            $matcheIdsAfterThisTeamMade = array_column($matcheIdsAfterThisTeamMade, 'id');
            //  $matcheIdsAfterThisTeamMade = [1];
        }
        $data['user_team_players'] = \App\Player::whereHas('player_teams', function ($query) use ($team_id) {
            $query->where('team_id', $team_id);
        })->get()->toArray();
        $userTeamPlayerIds = [0];
        if (!empty($data['user_team_players'])) {
            $userTeamPlayerIds = array_column($data['user_team_players'], 'id');
        }
        // $matcheIdsAfterThisTeamMade=[1,2,3,4,5,6,7,8,9,10];
        //dd($matcheIdsAfterThisTeamMade);
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
            }, 'player_actual_teams' => function ($query) use ($tournament_id) {
                $query->where('tournament_id', $tournament_id);
            }
        ])->get()->toArray();


        // dd($data['team_score']);
//       debugArr($data['team_score']);
//       die;
        $x = \App\UserTeam::where('user_id', \Auth::id())->with('user_team_player.player_matches')->get();
        $data['matches'] = \App\Match::all()->where('tournament_id', $tournament_id)
            ->where('matches', '>=', date("Y-m-d"))
            ->sortByDesc("start_date")->toArray();

        $data['userprofileinfo'] = \App\User::findOrFail(\Auth::id());
        $data['tournament_id'] = $tournament_id;
        // dd($data['user_team_player_transfer']->toArray());
        //points calculation script
//return response()->json($data['team_score']);

//return $this->playerScoreInTournament($data['team_score']);


        $usersSelectedPlayers = userTeamPlayers($team_id, $tournament_id);
        $team_name = $usersSelectedPlayers['name'];
        $selectedPlayers = [];
        if (!empty($usersSelectedPlayers['user_team_player'])) {
            $selectedPlayers = array_column($usersSelectedPlayers['user_team_player'], 'id');
        }

        $roles = \App\GameRole::with(['players.player_tournaments' => function ($q) use ($tournament_id) {
            $q->where('tournament_id', $tournament_id);
        },
//            'players' => function ($q) use ($selectedPlayers) {
//                $q->whereNotIn('players.id', $selectedPlayers);
//            },
            'players.player_actual_teams' => function ($query) use ($tournament_id) {
                $query->where('tournament_id', $tournament_id);
            },
        ])->whereHas('players.player_tournaments', function ($query) use ($tournament_id) {
            $query->where('tournament_id', $tournament_id);
        })->get()->toArray();
        //return response()->json($data[$r]);

        $tournament_players = [];
        $tournament_players['team_total'] = 0;

        foreach ($roles as &$role) {

            foreach ($role['players'] as $key => &$player) {

                if (empty($player['player_tournaments'])) {
                    unset($role['players'][$key]);

                } else {
                    $player['profile_pic'] = getUploadsPath($player['profile_pic']);
                    if (empty($player['player_actual_teams'])) {
                        $player['team_name'] = NULL;
                    } else {
                        $player['team_id'] = $player['player_actual_teams'][0]['id'];
                        $player['team_name'] = $player['player_actual_teams'][0]['name'];
                        unset($player['player_actual_teams']);
                    }
                    if (empty($player['player_tournaments'])) {

                        $player['tournament_id'] = NULL;
                        $player['tournament_name'] = NULL;
                        $player['player_price'] = NULL;
                    } else {

                        $player['tournament_id'] = $player['player_tournaments'][0]['id'];
                        $player['tournament_name'] = $player['player_tournaments'][0]['name'];
                        $player['player_id'] = $player['player_tournaments'][0]['pivot']['player_id'];
                        $player['player_price'] = $player['player_tournaments'][0]['pivot']['player_price'];
                        $player['role_id'] = $player['pivot']['game_role_id'];

                        //  dd( $this->playerScoreInTournament($player['id'],$data));
                        $score = $this->playerScoreInTournament($player['id'], $data);

                        $player['score'] = $score['player_total'];

                        $tournament_players['team_total'] = $tournament_players['team_total'] + $player['score'];
                        //  $player['transfer'] = NULL;


                        if ($this->checkStatus(
                            $this->binary_search(  //binary search to find players in user team
                                $selectedPlayers, 0,
                                sizeof($selectedPlayers),
                                $player['id']))
                        ) {
                            if (empty($score['transfer'])) {
                                $player['transfer'] = [];
                            } else {
                                $player['transfer'][] = $score['transfer'];
                                $tournament_players['team_total'] += $score['transfer']['score'];

                            }

                        } else {
                            unset($player);
                            continue;

                        }


                        unset($player['player_tournaments']);
                        unset($player['pivot']);

                    }
                    $tournament_players[str_replace(
                        ' ',
                        '_',
                        strtolower($role['name']))][] = $player;

                }


            }
        }


        if (empty($tournament_players)) {
            return response()->json(['status' => "false", 'message' => 'No Players In this Tournaments', 'more_info' => []], 404);
        }

        $tournament_players['bat_count'] = (String)$this->getRoleCountInTeam(Auth::id(), $team_id, 5);
        $tournament_players['bowl_count'] = (String)$this->getRoleCountInTeam(Auth::id(), $team_id, 6);
        $tournament_players['wicket_count'] = (String)$this->getRoleCountInTeam(Auth::id(), $team_id, 8);
        $tournament_players['allround_count'] = (String)$this->getRoleCountInTeam(Auth::id(), $team_id, 7);
        $tournament_players['total_count'] = (String)getUserTeamPlayersCount($team_id);
        $tournament_players['current_score'] = (String)getUserTotalScore(Auth::id(), $tournament_id);
        $tournament_players['team_name'] = $team_name;
        return response()->json($tournament_players);
    }

    public function confirm_team(Request $request)
    {
        $team_id = $request->team_id;
        if (getUserTeamPlayersCount($team_id) == 11) {
            $userteamsave = \App\UserTeam::find($team_id);
            $userteamsave->joined_from_match_date = getGmtTime();
            $userteamsave->save();
            $data['status'] = "true";
            $data['message'] = "Team Completed";
        } else {
            $data['status'] = "false";
            $data['message'] = "Complete you 11 players";
        }
        return response()->json($data);
    }

    function playerScoreInTournament($player_id, $data)
    {
        $obj = [];
        $obj['transfer'] = [];
        $user_team_player_transfer = $data['user_team_player_transfer'];
        if (empty($user_team_player_transfer->toArray())) {
            $user_team_player_transfer = null;
        } else {
            $user_team_player_transfer = $user_team_player_transfer->toArray();
            $user_team_player_transfer = $user_team_player_transfer[0];
        }
        $playertotal = 0;
        $subtotal = 0;
        foreach ($data['team_score'] as $row) {

            foreach ($user_team_player_transfer['user_team_player_transfers'] as $transfer) {

                if ($transfer['pivot']['player_in_id'] == $player_id) {
                    //  dd($transfer['name']);
//                    /dd($row);
                    $obj['transfer']['id'] = $transfer['pivot']['player_out_id'];
//                    $obj['transfer']['team_name'] = $transfer['pivot']['player_out_id'];
                    $obj['transfer']['profile_pic'] = getUploadsPath($transfer['profile_pic']);
                    $obj['transfer']['name'] = $transfer['name'];
                    $obj['transfer']['score'] = $transfer['pivot']['player_out_score'];
                    //$playertotal=$playertotal+$transfer['pivot']['player_out_score'];
                    $playertotal = -$transfer['pivot']['player_in_score'];
                    //$playertotal=0;
                    $obj['transfer']['team_name'] = $transfer['player_actual_teams'][0]['name'];
                    $flag = 1;
                    // $playertotal+=$transfer['pivot']['player_out_score'];
                    //  $teamtotal += $transfer['pivot']['player_out_score'];
                    // $teamtotal -= $transfer['pivot']['player_in_score'];
                    $playerinscore = $transfer['pivot']['player_out_score'];
                    // $x = $transfer['pivot']['player_in_score'];

                }

            }


            if ($row['id'] == $player_id) {

                foreach ($row['player_game_term_score'] as $termscore) {
                    foreach ($termscore['points_devision_tournament'] as $points) {

                        if ($points['qty_from'] == $points['qty_to']) {
                            //   echo "yes";
                            //     echo $points['points'] * $termscore['player_term_count'];
                            $subtotal += $points['points'] * $termscore['player_term_count'];
                        } else {
                            if (($points['qty_from'] <= $termscore['player_term_count']) && ($points['qty_to'] >= $termscore['player_term_count'])) {
                                //  echo $points['qty_from']." ". $termscore['player_term_count']." ".$points['qty_to']."<br>";


                                $subtotal = $subtotal + $points['points'];


                            }
                        }

                    }
                }


            }
            //$playertotal=+;
        }
        $obj['player_total'] = $playertotal + $subtotal;
        // dd($playertotal);
        return $obj;
    }

    function isTournamentActive($tournament_id)
    {
        $objTourmament = \App\Tournament::where('id', $tournament_id)->
        where('end_date', '<', getGmtTime())->first();
        //list of active
        //dd($objTourmament->toArray());
        if (empty($objTourmament)) {
            return true;
        } else {
            return false;

        }

    }

    function checkTeam(Request $request)
    {
        $tournament_id = $request->id;
        $objTourmament = $this->isTournamentActive($tournament_id);
        // dd($objTourmament);
        if ($objTourmament) {
            if ($this->userHasTeamInTournament($tournament_id, \Auth::id())) {
                //check team complete or not
                //if complete send msg "team not completed" send team id
                //if completed send message"team Completed"

                $user_team = userTeamCompleteInTournament(\Auth::id(), $tournament_id);

                if (empty($user_team->joined_from_match_date)) {
                    return response()->json(
                        [
                            "status" => "true",
                            "is_complete" => 'false',
                            "team_id" => (String)$user_team->id,
                        ], 200);

                } else {
                    return response()->json(
                        [
                            "status" => "true",
                            "is_complete" => 'true',
                            "team_id" => (String)$user_team->id

                        ], 200);


                }


            } else {
                return response()->json(
                    [
                        "status" => 'false'
                    ], 200);

            }
        } else {
            $leader =  $result = \App\Leaderboard::where('tournament_id', $tournament_id)->with('user', 'user_team')->take(21)->
            orderBy('score', 'DESC')->first()->toArray();// dd($leader->toArray());

            return response()->json(
                [
                    "status" => "false",
                    "name" => $leader['user']['name'],
                    "profile_pic" => getUploadsPath($leader['user']['profile_pic']),
                    "score" => $leader['score']
                ], 200);
        }
    }

    function createTeam(\App\Http\Requests\CreateTeamRequest $request)
    {
        $team_name = str_replace('%20', ' ', strtolower($request->name));
        $tournament_id = $request->id;


        if ($this->userHasTeamInTournament($tournament_id, \Auth::id())) {
            return response()->json(
                [
                    'status' => false,
                    "message" => 'You already have a team in this tournament'
                ], 200);

        } else {
            if ($this->isUniqueTeamName($team_name, $tournament_id)) {
                $user_team = new \App\UserTeam;
                $user_team->name = $team_name;
                $user_team->tournament_id = $tournament_id;
                $user_team->user_id = Auth::id();
                $user_team->save();
                //  return $user_team->id;
                return response()->json(
                    [
                        'status' => true,
                        'team_id' => $user_team->id,
                        "message" => 'Team created'
                    ], 200);
            } else {
                return response()->json(
                    [
                        'status' => false,
                        "message" => 'Team name not available'
                    ], 200);
            }
        }


    }

    function cmp($a, $b)
    {
        return ($a < $b) ? -1 : (($a > $b) ? 1 : 0);
    }

    function checkStatus($id)
    {

        if ($id < 0) {
            return false;
        } else {
            return true;
        }
    }

    function binary_search(array $a, $first, $last, $key)
    {
        $lo = $first;
        $hi = $last - 1;

        while ($lo <= $hi) {
            $mid = (int)(($hi - $lo) / 2) + $lo;
            $cmp = $this->cmp($a[$mid], $key);

            if ($cmp < 0) {
                $lo = $mid + 1;
            } elseif ($cmp > 0) {
                $hi = $mid - 1;
            } else {
                return $mid;
            }
        }
        return -1;
    }

    function getRoleCountInTeam($userid, $teamid, $roleid)
    {

        $count = DB::select("SELECT COUNT(pr.game_role_id) as total FROM `user_team_players` utp
        INNER JOIN player_roles pr ON pr.player_id = utp.player_id
        INNER JOIN user_teams ut ON ut.id = utp.team_id
        where utp.team_id = '$teamid' AND pr.game_role_id = '$roleid' AND ut.user_id = '$userid'");
        return ($count[0]->total);
        $x = \App\UserTeam::where('user_id', $userid)
            ->where('id', $teamid)
            ->with('user_team_player.player_roles')->firstOrFail()->toArray();

        $i = 0;
        foreach ($x['user_team_player'] as $row) {
            if ($row['player_roles'][0]['id'] == $roleid)
                $i++;
        }
        return $i;
    }

}
