<?php
//
//namespace App\Http\Controllers\user;
//
//use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
//
//class ChallengeController extends Controller
//{
//    //
//    protected $userChallenge;
//    public function __construct()
//    {
//        $this->userChallenge= new \App\UserChallenge;
//    }
//
//    public function sendChallenge(Request $request){ //user2 id is the id to whom challenge is being sent
//        $this->userChallenge->fill($request->all());
//        $this->userChallenge->save();
//    }
//    public function showChallenges($user_id){
//        $this->userChallenge->get();
//    }
//    public function acceptChallenge($user_id){
//        $challenge=$this->userChallenge->findOrFail($user_id);
//        $challenge->is_accepted;
//    }
//
//}
