<?php

namespace App\Http\Controllers\api;

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

    function index()
    {
        // dd(getGmtTime());
        $tournamnets = [];
        foreach ($this->tournamnetObj->get() as $tour) {
            if ($tour['stat_date'] < getGmtTime() && $tour['end_date'] < getGmtTime()) {
                $tournamnets['previous'][] = $tour['name'];
            }
            if ($tour['stat_date'] < getGmtTime() && $tour['end_date'] > getGmtTime()) {
                $tournamnets['current'][] = $tour['name'];
            }
            if ($tour['stat_date'] > getGmtTime() && $tour['end_date'] > getGmtTime()) {
                $tournamnets['upcomming'][] = $tour['name'];
            }

        }

        return response()->json($tournamnets);

    }
}
