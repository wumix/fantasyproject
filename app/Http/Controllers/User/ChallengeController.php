<?php

namespace App\Http\Controllers\user;

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

    public function index()
    {
        $data['tournament_list'] = \App\Tournament::all()->sortBy("start_date")->where('end_date', '>', getGmtTime());
        $data['users'] = \App\Leaderboard::where('tournament_id', config('const.tournament_id'))
            ->with('user', 'user_team')->orderBy('score', 'DESC')->paginate(9);
        return view('user.challenge.challenge', $data);
    }

    public function sendChallenge(Request $request)
    {

        $request->request->remove('_token');
        $request->request->add(['match_id' => $request->match_id]);
        $data = $this->userChallenge->where(['user_1_id' => $request->user_1_id, 'user_2_id' => $request->user_2_id])->first();
        // if (empty($data)) {
        if (1) {
            $this->userChallenge->fill($request->all());
            $this->userChallenge->save();
            $sender = \App\User::find($request->user_1_id);
            $reciever = $id = \App\User::find($request->user_2_id);
            \Mail::to($reciever->email)->send(new \App\Mail\Challenge($sender->name, $reciever->name));
            return redirect()->route('addChallengeTeam', ['match_id' => $request->match_id]);

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

    public function addChallengeTeam($match_id)
    {
        $match_id = 96;
        $data['roles'] = \App\GameRole::where('game_id', 1)
            ->with([
                'players.player_matches' => function ($query) use ($match_id) {
                    return $query->where('matches.id', $match_id);
                },'players.player_roles',

            ])
            ->get()
            ->toArray();
        $data['team_id']=5;
        return view('user.challenge.user_challenge_team',$data);
    }
    public function addPlayerTochallengeTeam(){

    }

    public function acceptChallenge($id)
    {

        $challenge = $this->userChallenge->findOrFail($id);
        $challenge->is_accepted = 1;
        $challenge->save();
        return redirect()->back()
            ->with('status', 'Challenge Accepted ');

    }

    public function checkWinner($challenge_id)
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
