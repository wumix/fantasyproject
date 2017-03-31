<?php

namespace App\Http\Controllers\Admin;

use \App\Game;
use \App\Player;
use App\TournamentRoleLimit;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class TournamentsController extends Controller
{

    protected $objTourmament;

    function __construct()
    {
        $this->objTourmament = new \App\Tournament;
    }

    /**
     * Get a validator for an incoming request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'game_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'venue' => 'required|max:100',
            'max_players' => 'integer'
        ]);
    }

    public function index()
    {
        $objTourmament = \App\Tournament::all()->toArray();
        $data['tournaments_list'] = $objTourmament; //list of tournaments
        return view('adminlte::tournaments.tournaments_list', $data);
    }

    public function addTournamentForm()
    {
        $data['result'] = Game::all()->toArray();
        return view('adminlte::tournaments.add_tournament', $data);
    }

    function add(Request $request)
    {
        $this->validator($request->all())->validate();
        $newTournament = new \App\Tournament;
        $newTournament->name = $request->name;
        $newTournament->game_id = $request->game_id;
        $newTournament->start_date = $request->start_date;
        $newTournament->end_date = $request->end_date;
        $newTournament->venue = $request->venue;
        if (Input::hasFile('t_logo')) {
            $files = uploadInputs(Input::file('t_logo'), 'tournament_logos');
            $newTournament->t_logo = $files;
        }
        $newTournament->max_players = $request->max_players;
        $newTournament->save();
        return redirect()->route('editTournamentForm', ['tournament_id' => $newTournament->id]);
    }

    function editTournamentForm($tournament_id)
    {
        try {

            $data['tournament_games'] = \App\Tournament::where('id', $tournament_id)
                ->with('tournament_game', 'tournament_game.game_terms', 'game_term_points')
                ->firstOrFail()->toArray();
            $data['games'] = Game::all()->toArray();
            //dd($data);
            return view('adminlte::tournaments.tournament_edit', $data);
        } catch (ModelNotFoundException $ex) {
            abort('404');
        }
    }

    function postEditTournament()
    {

        $tournamentId = Input::get('id');
        $tournament = \App\Tournament::find($tournamentId);
        $tournament->fill(Input::all());

        if (Input::hasFile('t_logo')) {
            $files = uploadInputs(Input::file('t_logo'), 'tournament_logos');
            $tournament->t_logo = $files;
        }
        $tournament->save();
        \App\TournamentGameTermPoint::where('tournament_id', $tournament->id)->delete(); //Deleting all game points
        \App\TournamentGameTermPoint::insert(Input::get('tournament_game_term_points')); //Insertong them again

        return redirect()->route('editTournamentForm', ['tournament_id' => Input::get('id')])
            ->with('status', 'Tournament Updated');
    }

    function addTournamentRoles($tournament_id)
    {
       // Category::with('challenges')->whereName($category_name)->first()->challenges;
      //  $a = \App\Tournament::where('id', $tournament_id)->withPivot($tournament_id);
     // dd($a);
        $data['tournament_max_roles_values'] = \App\Tournament::where('id', $tournament_id)->with('tournament_role_max')->firstOrFail()->toArray();
        $data['tournament_max_roles'] = \App\Tournament::where('id', $tournament_id)->with('tournament_game.game_roles')->firstOrFail()->toArray();
      //  dd($data['tournament_max_roles']);
        return view('adminlte::tournaments.add_tournament_max_roles', $data);

    }

    function postAddmaxRoles($tournamentId, Request $request)
    {
       //dd( $request->all());

        $tour = \App\Tournament::find($tournamentId);
        $tour->tournament_role_limit()->sync(array_filter($request->player_role_id)); //can also user insert here
        return redirect()->route('postAddmaxRoles', ['tournament_id' => $tournamentId]);
    }

    function showAddPlayerForm($tournament_id)
    {
        try {
            $data['players_in_tournament'] = [];
            $data['players_list'] = \App\Tournament::where('id', $tournament_id)
                ->with(['tournament_game' => function () {

                    }, 'tournament_game.game_players' => function () {

                    }, 'tournament_players' => function ($query) {

                    }]
                )->firstOrFail()->toArray();

            ////////Making player price
            //End making player price
            if (!empty($data['players_list']['tournament_players'])) {
                $data['players_in_tournament'] = array_flatten(array_column(array_column($data['players_list']['tournament_players'], 'pivot'), 'player_id'));
            }
            return view('adminlte::tournaments.add_tournament_players', $data);
        } catch (ModelNotFoundException $ex) {
            abort(404);
        }
    }

    function postAddTournamentPlayers()
    {
        //  dd(Input::get('tournament_id'));
        //  dd(Input::all());
        $postedData = Input::all();
        //dd($postedData);
        $playerTournament = removeElementWithOutKey($postedData['player_tournament'], 'player_id');
        //   dd($postedData);
        \App\PlayerTournament::where('tournament_id', $postedData['tournament_id'])->delete();
        //dd($playerTournament);
        \App\PlayerTournament::insert($playerTournament);
        return redirect()
            ->route('showAddPlayerForm', ['tournament_id' => Input::get('tournament_id')])
            ->with('status', 'Player added to tournament');
    }

}
