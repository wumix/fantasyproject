<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LiveScoreController extends Controller
{
    function index(){
        $data['match_scores']=\App\Match::where('cricscore_api','!=',0)
            ->with('match_scores')->get()->toArray();
       return response()->json($data['match_scores']);
    }
}
