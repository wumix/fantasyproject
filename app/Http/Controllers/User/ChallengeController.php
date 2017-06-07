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

    public function sendChallenge(Request $request)
    { //user2 id is the id to whom challenge is being sent

        $this->userChallenge->fill($request->all());
        $this->userChallenge->save();
    }

    public function showUserChallenges()
    {
        $r = $this->userChallenge->where('user_2_id', \Auth::id())->get()->toArray();
        //$r=$this->userChallenge->find('12')->get()->toArray();
        dd($r);
    }

    public function acceptChallenge($id)
    { //challenge id
        $challenge = $this->userChallenge->findOrFail($id);
        $challenge->is_accepted = $id;
        $challenge->save();

    }

    public function checkWinner($challenge_id)
    {


        $challenge = $this->userChallenge->findOrFail($challenge_id)->first()->toArray();
        $user_1_id=$challenge['user_1_id'];
        $user_2_id=$challenge['user_2_id'];
        $tournament_id=$challenge['tournament_id'];
//        $data['upcommingTour'] = \App\Tournament::all()->sortBy("start_date")->
//        where('start_date', '>=', getGmtTime());
        \App\Leaderboard::where('user_id',$user_1_id)->where('user_id',$user_2_id);





        dd($user_1_id);
        getGmtTime();

    }


}
