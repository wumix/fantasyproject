<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class RankingController extends Controller {

    /**
     * Get a validator for an incoming request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'player_name' => 'required|max:255',
                    'country_id' => 'required',
                    'rating' => 'required|numeric'
        ]);
    }

    public function index() {
        $data['ranking_cats'] = \App\RankingCategory::all()->toArray();
        return view('adminlte::players.player_ranking', $data);
    }

    public function add($rankCatId) {
        $data['ranking_cat_data'] = \App\RankingCategory::where('id', $rankCatId)->first()->toArray();
        $data['countries'] = \App\Country::all()->toArray();
        return view('adminlte::players.add_ranking', $data);
    }

    public function addPost(Request $request) {
        $this->validator($request->all())->validate();
        $ranking = new \App\Ranking();
        $ranking->ranking_category_id = $request->get('ranking_category_id');
        $ranking->player_name = $request->get('player_name');
        $ranking->country_id = $request->get('country_id');
        $ranking->rating = $request->get('rating');
        $ranking->save();
        return redirect()->back()->with('status', 'Ranking added successfully');
    }

    public function playerRankings($rankCatId) {
        $data['ranking_cat_data'] = \App\RankingCategory::where('id', $rankCatId)->first()->toArray();
        $data['players'] = \App\Ranking::with('country')
                        ->where('ranking_category_id', $rankCatId)
                        ->orderBy('rating', 'DESC')
                        ->get()->toArray();
        return view('adminlte::players.player_rankings', $data);
    }

    public function edit($rankId) {

        $data['ranking'] = \App\Ranking::where('id', $rankId)->first()->toArray();
        $data['ranking_cat_data'] = \App\RankingCategory::where('id', $data['ranking']['ranking_category_id'])->first()->toArray();
        $data['countries'] = \App\Country::all()->toArray();
        return view('adminlte::players.edit_ranking', $data);
    }

    public function editPost(Request $request, $rankingId) {
        $this->validator($request->all())->validate();
        $ranking = \App\Ranking::find($rankingId);
        $ranking->ranking_category_id = $request->get('ranking_category_id');
        $ranking->player_name = $request->get('player_name');
        $ranking->country_id = $request->get('country_id');
        $ranking->rating = $request->get('rating');
        $ranking->save();
        return redirect()->back()->with('status', 'Ranking edited successfully');
    }

    public function deleteRanking($rankingId) {
        \App\Ranking::destroy($rankingId);
        return redirect()->back()->with('status', 'Ranking deleted successfully');
    }

}
