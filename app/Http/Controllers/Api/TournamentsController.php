<?php

namespace App\Http\Controllers\api;

use \JWTAuth;
use App\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TournamentsController extends Controller
{
    protected $tournamnetObj;

    function __construct()
    {
        $this->tournamnetObj = new Tournament;
    }

    function index(Request $request)
    {
//dd(apache_request_headers());
        // dd(getGmtTime());
        $tournamnets = [];
        $tournamnets['previous'] = [];
        $tournamnets['current'] = [];
        $tournamnets['upcoming'] = [];
        $data = $this->tournamnetObj->orderBy('start_date', 'DESC')->get()->toArray();

        foreach ($data as $tour) {
            if ($tour['start_date'] < getGmtTime() && $tour['end_date'] < getGmtTime()) {

                $tour['start_date'] = formatDate($tour['start_date']);
                $tour['end_date'] = formatDate($tour['end_date']);
                $tour['t_logo'] = getUploadsPath($tour['t_logo']);
                $tournamnets['previous'][] = $tour;
                continue;
            }
            if ($tour['start_date'] < getGmtTime() && $tour['end_date'] > getGmtTime()) {
                $tour['start_date'] = formatDate($tour['start_date']);
                $tour['end_date'] = formatDate($tour['end_date']);
                $tour['t_logo'] = getUploadsPath($tour['t_logo']);
                $tournamnets['current'][] = $tour;
                continue;
            }
            if ($tour['start_date'] > getGmtTime() && $tour['end_date'] > getGmtTime()) {
                $tour['start_date'] = formatDate($tour['start_date']);
                $tour['end_date'] = formatDate($tour['end_date']);
                $tour['t_logo'] = getUploadsPath($tour['t_logo']);
                $tournamnets['upcoming'][] = $tour;
                continue;
            }

        }

        return response()->json($tournamnets);

    }

    public function show($tournament_id)
    {
        $fixture_details = \App\Tournament::where('id', $tournament_id)->with(['tournament_matches' => function ($query) {
            $query->orderBy('start_date', 'asc');

        }])->first();
        if (empty($fixture_details['tournament_matches'])) {
            return response()->json(['message' => 'No tournament Found', 'more_info' => []], 404);


        } else {
            foreach ($fixture_details['tournament_matches'] as &$row) {
                $row['start_date']=formatDate($row['start_date']);
                $row['start_time']=formatTime($row['end_date']);
                $row['team_1_logo']=getUploadsPath($row['team_1_logo']);
                $row['team_2_logo']=getUploadsPath($row['team_2_logo']);
                unset($row['end_date'],$row['deleted_at'],$row['created_at'],$row['updated_at']);
            }

            $fixtures['fixtures']=$fixture_details['tournament_matches'];
            return response()->json($fixtures, 200);

        }

    }
}
