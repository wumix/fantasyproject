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
        foreach ($this->tournamnetObj->get() as $tour) {
            if ($tour['stat_date'] < getGmtTime() && $tour['end_date'] < getGmtTime()) {
                $tournamnets['previous'][] = $tour;
            }
            if ($tour['stat_date'] < getGmtTime() && $tour['end_date'] > getGmtTime()) {
                $tournamnets['current'][] = $tour;
            }
            if ($tour['stat_date'] > getGmtTime() && $tour['end_date'] > getGmtTime()) {
                $tournamnets['upcomming'][] = $tour;
            }

        }

        return response()->json($tournamnets);

    }

    public function show($id)
    {
        $tournament_detail = \App\Tournament::find($id);
        if(empty($tournament_detail)){
            return response()->json(['message' => 'Not tournament Found','more_info'=>[]], 404);


        }else{
            return response()->json($tournament_detail, 200);

        }

    }
}
