<?php

namespace App\Http\Controllers\admin;

use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;

class TeamsController extends Controller
{
    //
    public function index()
    {
        $data['teams'] = Team::all()->toArray();
//dd($data['teams']);
        return view('adminlte::teams.team_list', $data);
    }

    function showAddTeamForm(Request $request)
    {
        $tournaments = \App\Tournament::all();
        $data['tournaments_list'] = $tournaments->toArray();
        //  dd( $data['tournaments_list']);
        return view('adminlte::teams.add_team', $data);
    }

    function postAddTeam(Request $request)
    {
        \App\Team::insert(array_except($request->all(), '_token'));
        return redirect()->back()->with('status', 'Team Added');
    }

    public function editTeam($team_id)
    {
        $tournaments = \App\Tournament::all();
        $data['tournaments_list'] = $tournaments->toArray();
        $data['team'] = Team::findORFail($team_id)->toArray();
        //  dd($data['team']);
        return view('adminlte::teams.team_edit', $data);
    }

    public function postEditTeam(Request $request, $team_id)
    {
        //dd($request->all());
        $teams = \App\Team::find($team_id);
        //dd($team->toArray());
        $teams->name = $request->team_name;
        $teams->tournament_id = $request->tournament_id;
        $teams->save();
        return redirect()
            ->route('editTeam', ['team_id' => $team_id]);
    }

    public function addPlayersToTeam(Request $request, $team_id)

    {
        $data['selected_players'] = Team::where('id', $team_id)->with([
            'team_players'=>function($query){
                $query->select('players.id');
            }
        ])->firstOrFail()->team_players->toArray();
        $data['players_in_team'] = [];
        if(!empty($data['selected_players'])){
            $data['players_in_team'] = array_column($data['selected_players'], 'id');
        }


        $data['tournament_team'] = Team::where('id', $team_id)->firstOrFail()->toArray();
        $data['team_id'] = $team_id;
        $data['players'] = \App\Player::all();
        return view('adminlte::teams.add_team_players', $data);
    }

    function postAddTeamPlayers($team_id)
    {
        Team::find($team_id)->team_players()->sync(Input::get('player_id'));
        return redirect()->back()->with('status', 'Team players updated');
    }
}
