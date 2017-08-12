<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;


use App\GameAction;
use App\Http\Requests;
use App\Mail\MyMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\App;
use Validator;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    public function __construct()
    {

//        $users=\App\User::all();
//        foreach($users as $user){
//            $user= \App\User::find($user['id']);
//            $user->referral_key= \Crypt::encrypt($user->email);
//            $user->save();
//        }





    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function newdash()
    {

        $data['user_teams'] = \App\UserTeam::where('user_id', \Auth::id())
            ->get()
            ->toArray();
        //dd($data);
        $data['userprofileinfo'] = \App\User::findOrFail(\Auth::id());
        $data['upcommingTour'] = \App\Tournament::all()->sortBy("start_date")->where('start_date', '>=', getGmtTime());

        dd($data['upcommingTour']->toArray());
        return view('user.dashboard.newdash', $data);
    }


    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    function getServerTimeAsGMT()
    {
        $timestamp = localtime();
        $timestamp[5] += 1900;
        $timestamp[4]++;
        for ($i = 0; $i <= 9; $i++) {
            if ($timestamp[0] == $i) {
                $newValue = "0" . $i;
                $timestamp[0] = $newValue;
            }
        }
        for ($i = 0; $i <= 9; $i++) {
            if ($timestamp[1] == $i) {
                $newValue = "0" . $i;
                $timestamp[1] = $newValue;
            }
        }

        $this->timestamp = $timestamp[5] . "-" . $timestamp[4] . "-" . $timestamp[3] . " " . $timestamp[2] . ":" . $timestamp[1] . ":" . $timestamp[0];
        $this->timestamp = strtotime($this->timestamp);
        return $this->timestamp;
    }


    public function index()
    {
       // echo(getGmtTime());
//        $objTourmament = \App\Tournament::all()->sortBy("start_date")->
//        where('end_date', '>', getGmtTime());
        //dd($objTourmament->toArray());

        $objTourmament = \App\Tournament::orderBy("start_date",
            'DESC')->
        Where('end_date', '>=', getGmtTime())->get();
        $data['tournaments_list'] = $objTourmament->toArray(); //list of active
       // dd($objTourmament->toArray());
        //dd($data['tournaments_list']);
        //  dd($tournaments_list);
        //dd($tournaments_list);
        //dd(  $data['tournaments_list']);
        $tournaments_data = [];
        foreach ($data['tournaments_list'] as $key => $tournament) {
            $data['tournaments_list'][$key] = $tournament;
            $data['tournaments_list'][$key]['leaderboard'] = \App\Leaderboard::where('tournament_id', $tournament['id'])->where('score','>',0)->with('user', 'user_team')->take(3)->orderBy('score', 'DESC')->get()->toArray();
            $data['tournaments_list'][$key]['nextmatch'] = \App\Match::getNextMatch($tournament['id']);
        }
    //  dd($data['tournaments_list']);

        // $data['tournaments_list']['leaderboard']=\App\Leaderboard::where('tournament_id', config('const.tournament_id'))->with('user', 'user_team')->take(3)->orderBy('score', 'DESC')->get()->toArray();
        $upcommingTour = \App\Tournament::all()->sortBy("start_date")->where('start_date', '>=', getGmtTime());
        $data['upcomming_tournaments_list'] = $upcommingTour->toArray(); //upcomming tournament of active
        // $data['matches'] = \App\Match::getNextMatch();
        //$data['matches']=$data['matches']->toarray();
        // $data['leaders'] = \App\Leaderboard::where('tournament_id', config('const.tournament_id'))->with('user', 'user_team')->take(3)->orderBy('score', 'DESC')->get()->toArray();
        $data['news'] = \App\BlogPost::where('post_type', 'news')->take(3)->orderBy('id', 'DESC')->get()->toArray();

        return view('home', $data);
    }

    public function leaderboard($tournament_id)
    {
        $data['leaders'] = \App\Leaderboard::where('tournament_id', $tournament_id)->with('user', 'user_team')->take(21)->
        orderBy('score', 'DESC')->get()->toArray();
        $data['tournamet'] = \App\Tournament::find($tournament_id)->name;
        return view('pages.leaderboard', $data);

    }
    function allTournaments()
    {

        $datetime = new \DateTime();
        $date = $datetime->format('Y-m-d H:i:s');
        $objTourmament = \App\Tournament::all()->sortByDesc('start_date');
        $data['tournaments_list'] = $objTourmament->toArray();
        return view('user.dashboard.home', $data);

    }


//    public function leaderboard()
//    {
//        $data['leaders'] = \App\Leaderboard::with('user', 'user_team')->take(21)->orderBy('score', 'DESC')->get()->toArray();
//        return view('pages.leaderboard', $data);
//
//    }

    public function fixturesDetial($tournament_id)
    {
        $data['fixture_details'] = \App\Tournament::where('slug', $tournament_id)->with(['tournament_matches' => function ($query) {
            $query->orderBy('start_date', 'asc');

        }])->firstOrFail()->toArray();

        return view('pages.fixtures_c_trophy', $data);

    }

    public function contactPage()
    {
        return view('pages.contact');
    }


    public function upcommingTournamnets()
    {
        return view('pages.upccoming_tournaments');
    }


    public function championTrophy()
    {
        return view('pages.fixtures_c_trophy');
    }

    public function rankings()
    {
//        $stats = \App\Game::where('id', '1')
//            ->with('game_roles', 'game_type.game_type_points.player_roles')->get()->toArray();
//        $data['rankings'] = $stats;
//        //dd($stats);
        $data['rankings'] = \App\RankingCategory::with(['category_players' => function ($query) {
            $query->orderBy('rating', 'DESC');

        }])->get()->toArray();
        //dd($data['rankings']);

        return view('pages.rankings', $data);
    }

    public function postContact(Request $request)
    {
        $this->validatorContact($request->all())->validate();
        $emailRecievers = [
            'umair_hamid100@yahoo.com',
            'hassan@branchezconsulting.com',
            'jahangeer.yousaf@gmail.com',
            'alraadu58@gmail.com',
            'adeel@branchezconsulting.com'
        ];
        \Mail::send('emails.contact', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message')
        ), function ($message) use ($request, $emailRecievers) {
            $message->from($request->get('email'));
            $message->to($emailRecievers, 'Admin')->subject('Gamithon Contact');
        });
        return redirect()->back()->with('status', 'Thanks for contacting us!');
    }

    /**
     * Get a validator for an incoming request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorContact(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
    }

    public function termsCon()
    {
        return view('pages.t-c');
    }

    public function privacyPolicy()
    {
        return view('pages.p-p');
    }

    public function howPlay()
    {
        $data['tournament'] = \App\Tournament::where('id',6)
            ->with('tournament_game.game_actions.game_terms', 'game_term_points')
            ->firstOrFail()
            ->toArray();
        $data['game_actions'] = $data['tournament']['tournament_game']['game_actions'];
        return view('pages.how-to-play', $data);
    }

}
