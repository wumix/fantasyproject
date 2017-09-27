<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\User;

class ChallengeController extends Controller
{

    function index()
    {

    }

    function showChallenges()
    {

        $data['sent_challenges'] = \App\UserChallenge::where(['user_1_id' => \Auth::id()])->with(['user_by'])->get()->toArray();
        $data['accepted_challenges']= \App\User::where(['id' => \Auth::id()])->with(['challenges' => function ($query) {
            $query->where('status', 1);
        }, 'challenges.user'])->get()->toArray();

        return response()->json($data);
    }
    function sendChallenge(Request $request){

        $match_id = $request->match_id;
        $match_id = $request->points;
        if(empty($match_id)){
            return redirect()->back()
                ->with('status', 'You have must select a match');
        }
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

}
