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

    public function scorecard(Request $request, $id, $tournament_id)
    {
        $data['tournament_id'] = $tournament_id;
        $data['match'] = \App\Match::where('id', $id)->with(
            ['match_players.player_gameTerm_score' => function ($q) use ($id) {
                return $q->where('match_id', $id)->where('player_term_count', '!=', 0);
            },

                'match_players.player_gameTerm_score.game_terms' => function ($q) {
                    $q->orderBy('id', 'ASC');
                },
                'match_players.player_match_stats' => function ($q) use ($id) {
                    $q->where('match_id', $id);
                }, 'match_players.player_actual_teams' => function ($query) use ($tournament_id) {
                $query->where('tournament_id', $tournament_id);
            }, 'match_players.player_roles' => function ($role) {
                $role->orderBy('game_role_id','ASC');
            }
            ])
            ->first()->toArray();
        $team_name = $data['match']['team_one'];
        if (!empty($request->team_name)) {
            $team_name = $request->team_name;
        }
        $data['team_name'] = strtoupper($team_name);
        // dd($team_name);
       // dd($data['match']['match_players'][0]);
        return view('user.team_detail1', $data);

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function test()
    {
        return view('user.team_detail1');
    }

    public function newdash()
    {

        $data['user_teams'] = \App\UserTeam::where('user_id', \Auth::id())
            ->get()
            ->toArray();
        //dd($data);
        //dd($data);
        $data['userprofileinfo'] = \App\User::findOrFail(\Auth::id());
        $data['upcommingTour'] = \App\Tournament::all()->sortBy("start_date")->where('start_date', '>=', getGmtTime());

        //  dd($data['upcommingTour']->toArray());
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


        $objTourmament = \App\Tournament::orderBy("start_date",
            'asc')->
        Where('end_date', '>=', getGmtTime())->get();
        $data['tournaments_list'] = $objTourmament->where('is_active', 1)->toArray(); //list of active
        $tournaments_data = [];
        foreach ($data['tournaments_list'] as $key => $tournament) {
            $data['tournaments_list'][$key] = $tournament;
            $data['tournaments_list'][$key]['leaderboard'] = \App\Leaderboard::where('tournament_id', $tournament['id'])->where('score', '>', 0)->with('user', 'user_team')->take(3)->orderBy('score', 'DESC')->get()->toArray();
            $data['tournaments_list'][$key]['nextmatch'] = \App\Match::getNextMatch($tournament['id']);
        }
        $upcommingTour = \App\Tournament::all()->sortBy("start_date")->where('start_date', '>=', getGmtTime());
        $data['upcomming_tournaments_list'] = $upcommingTour->toArray(); //upcomming tournament of active
        $data['news'] = \App\BlogPost::where('post_type', 'news')->take(3)->orderBy('id', 'DESC')->get()->toArray();

        return view('home', $data);
    }

    public function leaderboard($tournament_id)
    {
        $data['leaders'] = \App\Leaderboard::where('tournament_id', $tournament_id)->with('user', 'user_team')->take(20)->
        orderBy('score', 'DESC')->get()->toArray();
        $data['tournamet'] = \App\Tournament::find($tournament_id)->name;
        return view('pages.leaderboard', $data);

    }

    function allTournaments()
    {

        $datetime = new \DateTime();
        $date = $datetime->format('Y-m-d H:i:s');
        $objTourmament = \App\Tournament::where('is_active', 1)->get()->sortByDesc('start_date');
        $data['tournaments_list'] = $objTourmament->toArray();
        return view('user.dashboard.home', $data);

    }


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
        $data['tournament'] = \App\Tournament::where('id', 6)
            ->with(['tournament_game.game_actions.game_terms', 'game_term_points' => function ($query) {
                $query->orderBy('id', 'DESC');
            }])
            ->firstOrFail()
            ->toArray();
        $data['game_actions'] = $data['tournament']['tournament_game']['game_actions'];
        return view('pages.how-to-play', $data);
    }

}
