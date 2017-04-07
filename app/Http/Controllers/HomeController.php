<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\GameAction;
use App\Http\Requests;
use Illuminate\Http\Request;
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
    public function index() {
        $objTourmament = \App\Tournament::all()->sortBy("start_date");
        $data['tournaments_list'] = $objTourmament->toArray();
       // $data['matches'] = \App\Match::getNextMatch();

                $data['matches'] = \App\Match::getNextMatch();

        return view('home', $data);
    }

    public function contactPage() {
        return view('pages.contact');
    }

    public function postContact(Request $request) {
        $this->validatorContact($request->all())->validate();
        \Mail::send('emails.contact', array(
            'name' => $request->get('c_name'),
            'email' => $request->get('c_email'),
            'user_message' => $request->get('c_message')
                ), function ($message) use ($request) {
            $message->from($request->get('c_email'));
            $message->to('umair_hamid100@yahoo.com', 'Admin')->subject('Gamithon Contact');
        });

        return \Redirect::route('contact')->with('status', 'Thanks for contacting us!');
    }

    /**
     * Get a validator for an incoming request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorContact(array $data) {
        return Validator::make($data, [
                    'c_name' => 'required|max:255',
                    'c_email' => 'required',
                    'c_subject' => 'required',
                    'c_message' => 'required'
        ]);
    }

    public function termsCon() {
        return view('pages.t-c');
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
