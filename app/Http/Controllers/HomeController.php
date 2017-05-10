<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\GameAction;
use App\Http\Requests;
use App\Mail\MyMail;
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
class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    function getServerTimeAsGMT() {
        $timestamp = localtime();
        $timestamp[5] += 1900;
        $timestamp[4] ++;
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

    public function index() {
        $objTourmament = \App\Tournament::all()->sortBy("start_date");
        $data['tournaments_list'] = $objTourmament->toArray();
        $data['matches'] = \App\Match::getNextMatch();
        $data['leaders'] = \App\Leaderboard::with('user', 'user_team')->take(3)->orderBy('score', 'DESC')->get()->toArray();


        return view('home', $data);
    }

    public function contactPage() {
        return view('pages.contact');
    }
    public function fixturs(){
        return view('pages.fixtures_c_trophy');
    }
    public function upcommingTournamnets(){
        return view('pages.upccoming_tournaments');
    }
public function championTrophy(){
    return view('pages.fixtures_c_trophy');
}
    public function rankings(){
        return view('pages.rankings');
    }

    public function postContact(Request $request) {
        $this->validatorContact($request->all())->validate();
        $emailRecievers = [
            'umair_hamid100@yahoo.com',
            'hassan@branchezconsulting.com'
        ];
        \Mail::send('emails.contact', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message')
        ), function ($message) use ($request) {
            $message->from($request->get('email'));
            $message->to('umair_hamid100@yahoo.com', 'Admin')->subject('Gamithon Contact');
        });
        return redirect()->back()->with('status', 'Thanks for contacting us!');
    }

    /**
     * Get a validator for an incoming request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorContact(array $data) {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
    }

    public function termsCon() {
        return view('pages.t-c');
    }
    public function privacyPolicy() {
        return view('pages.p-p');
    }

    public function howPlay() {
        $data['tournament'] = \App\Tournament::where('id', 1)
            ->with('tournament_game.game_actions.game_terms', 'game_term_points')
            ->firstOrFail()
            ->toArray();
        $data['game_actions'] = $data['tournament']['tournament_game']['game_actions'];
        return view('pages.how-to-play', $data);
    }

}
