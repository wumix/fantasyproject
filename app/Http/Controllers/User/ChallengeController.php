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
        $data['users'] = \App\Leaderboard::where('tournament_id', config('const.tournament_id'))
            ->with('user', 'user_team')->orderBy('score', 'DESC')->paginate(9);
        return view('user.challenge.challenge', $data);
    }

    public function sendChallenge(Request $request)
    { //user2 id is the id to whom challenge is being sent
        $request->request->remove('_token');
        $request->request->add(['tournament_id' => config('const.tournament_id')]);
        $data = $this->userChallenge->where(['user_1_id' => $request->user_1_id, 'user_2_id' => $request->user_2_id])->first();
        if (empty($data)) {
            $this->userChallenge->fill($request->all());
            $this->userChallenge->save();
            $sender = \App\User::find($request->user_1_id);
            $reciever = $id = \App\User::find($request->user_2_id);
            \Mail::to($reciever->email)->send(new \App\Mail\SignUp($sender->name, $reciever->name));
            return redirect()->back()
                ->with('status', 'Challenge Sent Succesfully');

        } else {
            return redirect()->back()
                ->with('status', 'You have already challenged this user');
        }


    }


    public function showUserChallenges()
    {
        $r = $this->userChallenge->where('user_2_id', \Auth::id())->get()->toArray();
        //$r=$this->userChallenge->find('12')->get()->toArray();
        dd($r);
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
