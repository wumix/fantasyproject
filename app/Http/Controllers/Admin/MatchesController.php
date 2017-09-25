<?php

namespace App\Http\Controllers\admin;

use App\Game;
use App\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Match;
use App\Tournament;
use Illuminate\Support\Facades\App;
use Validator;
use Illuminate\Support\Facades\Input;

class MatchesController extends Controller {

    protected $objMatch;

    function __construct() {
        $this->objMatch = new Match;
    }

    public function index() {
        $data['tournamentId'] = Input::get('tournament_id');
        $data['tournaments'] = Tournament::all()->toArray();
        $this->objMatch = \App\Match::where('tournament_id', $data['tournamentId'])
            ->orderBY('start_date','desc')
            ->paginate(25);
        $data['matches_list'] = $this->objMatch; //list of games form games table
        return view('adminlte::matches.matches_list', $data);
    }

    public function calculateMatchChallenges($match_id){

        $match_challenges = \App\UserChallenge::where('match_id', $match_id)->with('challenge_players')->get()->toArray();

        foreach ($match_challenges as $challenge) {
            //dd($challenge);

            $tournamnet_id = \App\Match::where('id', $match_id)->first()->tournament_id;
            $user_1_team = \App\UserChallengeTeamPlayers::where(
                [
                    'user_id' => $challenge['user_1_id'],
                    'challenge_id' => $challenge['id']]
            )->get()->toArray();


            $userTeamPlayerIds = array_column($user_1_team, 'player_id');
            //dd($userTeamPlayerIds);
            $team_score1 = \App\Player::whereIn('id', $userTeamPlayerIds)->with(
                ['player_roles', 'player_matches',
                    'player_gameTerm_score' => function ($query) use ($match_id) {
                        $query->where('match_id', $match_id);
                    },
                    'player_gameTerm_score.game_terms' => function ($query) {
                        $query->select('name', 'id');
                    },
                    'player_gameTerm_score.points_devision_tournament' => function ($query) use ($match_id, $tournamnet_id) {
                        //$query->where('tournament_id', $tournamnet_id);

                    }
                ])->get()->toArray();

            //--------------------------

            foreach ($team_score1 as $row) {

                $playertotal = 0;


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


                \App\UserChallengePlayerScore::insert(
                    [
                        'user_id' => $challenge['user_1_id'],
                        'challenge_id' => $challenge['id'],
                        'score' => $playertotal,
                    ]);


            }
            //####### start user 2 cal
            $user_2_team = \App\UserChallengeTeamPlayers::where(
                [
                    'user_id' => $challenge['user_2_id'],
                    'challenge_id' => $challenge['id']]
            )->get()->toArray();


            $userTeamPlayerIds = array_column($user_2_team, 'player_id');
            //dd($userTeamPlayerIds);
            $team_score2 = \App\Player::whereIn('id', $userTeamPlayerIds)->with(
                ['player_roles', 'player_matches',
                    'player_gameTerm_score' => function ($query) use ($match_id) {
                        $query->where('match_id', $match_id);
                    },
                    'player_gameTerm_score.game_terms' => function ($query) {
                        $query->select('name', 'id');
                    },
                    'player_gameTerm_score.points_devision_tournament' => function ($query) use ($match_id, $tournamnet_id) {
                        //$query->where('tournament_id', $tournamnet_id);

                    }
                ])->get()->toArray();

            //--------------------------

            foreach ($team_score2 as $row) {

                $playertotal = 0;


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


                \App\UserChallengePlayerScore::insert(
                    [
                        'user_id' => $challenge['user_2_id'],
                        'challenge_id' => $challenge['id'],
                        'score' => $playertotal,
                    ]);


            }

            //## end user 2 cal

            //-----------------------------
            \App\UserChallenge::where('match_id',$match_id)->update(['won'=>1]);

        } //end outer forach

    }

    public function addMatchForm() {
        $this->objMatch = Tournament::with('teams')->get()->toArray();
        $data['result'] = $this->objMatch;
       //dd( $data['result'] );
        return view('adminlte::matches.add_match', $data);
    }
    public function tournament_teams_ajax(Request $request) {
        $tournamentTeams = \App\Team::where('tournament_id',$request->tournament_id)->get()->toArray();

        if (!empty($tournamentTeams)) {
            $data['tournamentTeams'] = $tournamentTeams;
        }


        return response()->json($tournamentTeams);

    }
    public function addTeamToMatchForm($matchid,$tournament_id){
        $teams=\App\Team::where('tournament_id',$tournament_id)->get()->toArray();

        $data=[];
        if(empty($teams)){
            abort(404);
        }
        $data['teams']=$teams;
        $data['matchid']=$matchid;
        $data['tournament_id']=$tournament_id;
        return view('adminlte::teams.add_team_to_match',$data); //shows add team to match form




    }
    function addTeamToMatchPost(Request $request,$match_id,$tournament_id){
        if(count($request->teams_id)!=2) {
            return redirect()
                ->route('addTeamToMatch', ['match_id' => $match_id,'tournament_id'=>$tournament_id])
                ->with('status', 'You must choose only two teams');
        }

        $myplayers=[];
        foreach($request->teams_id as $row) {
            $players = \App\Team::where('id', $row)->with('team_players')->firstOrFail()->toArray();

            foreach ($players['team_players'] as $key=>$val){
                $myplayers[]=$val['id'];


            }



        }
        $objMatch = \App\Match::findORFail($match_id);
        $objMatch->match_players()->sync(array_filter($myplayers));
        return redirect()
            ->route('addTeamToMatch', ['match_id' => $match_id,'tournament_id'=>$tournament_id])
            ->with('status', 'Teams Added sucessfully');
    }
    public function addMatch(Request $request) {
//dd($request->all());

        $this->objMatch->fill($request->all());
        if($request->hasFile('team_1_logo')){
            $files = uploadInputs($request->file('team_1_logo'), 'tournament_logos');
            $this->objMatch->team_1_logo=$files;

        }
        if($request->hasFile('team_2_logo')){
            $files1 = uploadInputs($request->file('team_2_logo'), 'tournament_logos');
            $this->objMatch->team_2_logo=$files1;
        }
        $this->objMatch->save();

        return redirect()
            ->route('editMatchForm', ['match_id' => $this->objMatch->id])
            ->with('status', 'Match Saved');
    }

    function editMatchForm($match_id,Request $request) {

        $matches = Match::where('id', $match_id)->with('match_tournament')->first();
        if (!empty($matches)) {
            $matches = $matches->toArray();
        } // check this later give error trhen game id has no realted data ::handle exception
        $data['match'] = $matches;

//       dd($match_id);
        $tournamentList = Tournament::all()->toArray();
        if (!empty($tournamentList)) {
            $data['tournamentlist'] = $tournamentList;
        }

        $tournamentTeams = \App\Team::where('tournament_id',$matches['tournament_id'])->get()->toArray();

        if (!empty($tournamentTeams)) {
            $data['tournamentTeams'] = $tournamentTeams;
        }


        return view('adminlte::matches.matches_edit', $data);
    }

    function postEditMatch($match_id, Request $request) {
        $match = \App\Match::find($match_id);
        $match->fill($request->all());
        if($request->hasFile('team_1_logo')){
            $files = uploadInputs($request->file('team_1_logo'), 'tournament_logos');
            $match->team_1_logo=$files;
        }
        if($request->hasFile('team_2_logo')){
            $files1 = uploadInputs($request->file('team_2_logo'), 'tournament_logos');
            $match->team_2_logo=$files1;
        }
        $match->save();
        return redirect()->route('editMatchForm', ['match_id' => $match_id])->with('status', 'Match Updated');
    }

    function addMatchPlayerForm($matchid) {
        $data['match_id'] = $matchid;
        $matchTournamentPlayers = \App\Match::where('id', $matchid)->with('match_tournament.tournament_players')->firstOrFail();
        $data['matchTournamentPlayers'] = $matchTournamentPlayers->toArray();
        //dd($data['matchTournamentPlayers']);
        $existingMatchPlayer = \App\Match::where('id', $matchid)->with('match_players')->firstOrFail();
        $data['existingPlayers'] = $existingMatchPlayer->match_players->toArray();

        return view('adminlte::matches.add_match_players', $data);
    }

    function postAddMatchPlayers($match_id, Request $request) {
        dd($request->all());
        $objMatch = \App\Match::findORFail($match_id);
        $objMatch->match_players()->sync(array_filter($request->player));
        return redirect()->back()->with('status', 'Match player score updated.');
    }

    function getMatchPlayers($match_id) {
        $data['players'] = Match::where('id', $match_id)
            ->with('match_players')
            ->firstOrFail()
            ->toArray();
        //dd($data);
        return view('adminlte::matches.show_players', $data);
    }

    function playerMatchScore($match_id, $player_id) {
        $gameId = Match::where('id', $match_id)->with('match_tournament')->firstOrFail()
            ->toArray();
        $gameId = $gameId['match_tournament']['game_id'];

        $data['player'] = Player::where('id', $player_id)->first()->toArray();
        $data['match'] = Match::where('id', $match_id)->with([
            'player_scores' => function($query) use ($player_id) {
                $query->where('player_id', $player_id);
            }
        ])->first()->toArray();

        $data['game_actions'] = \App\GameAction::where('game_id', $gameId)
            ->with('game_terms')
            ->get()->toArray();
        $data['match_id'] = $match_id;
        $data['player_stat']=\App\PlayerMatchStats::where('match_id', $match_id)
            ->where('player_id', $player_id)->first();
        if(!empty($data['player_stat'])){
            $data['player_stat']=$data['player_stat']->text;
        }else{
            $data['player_stat']="N-A";
        }




        return view('adminlte::matches.add_player_match_score', $data);
    }

    function postAddMatchScore($match_id, $player_id) {

        \App\MatchPlayerScore::where('match_id', $match_id)
            ->where('player_id', $player_id)
            ->delete();
        foreach (Input::get('term_score') as $key => $val) {
            $playerMatchPoints['match_id'] = $match_id;
            $playerMatchPoints['player_id'] = $player_id;
            $playerMatchPoints['game_term_id'] = $key;
            $playerMatchPoints['player_term_count'] = empty($val) ? 0 : $val;
            \App\MatchPlayerScore::insert($playerMatchPoints);
        }
        return redirect()->back()->with('status', 'Match player score updated.');
    }
    function postAddMatchStats(Request $request,$match_id, $player_id) {

        \App\PlayerMatchStats::where('match_id', $match_id)
            ->where('player_id', $player_id)
            ->delete();
        $playerMatchPoints['text']=$request->details;
        $playerMatchPoints['match_id'] = $match_id;
        $playerMatchPoints['player_id'] = $player_id;
        \App\PlayerMatchStats::insert($playerMatchPoints);


        return redirect()->back()->with('status', 'Match player score updated.');
    }

}
