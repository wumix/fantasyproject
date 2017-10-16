<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LiveScoreController extends Controller
{
    function index(){
        $data['scores']=\App\Match::where('cricapi_match_id','!=',0)
            ->with('match_scores')->get()->toArray();
       return response()->json($data);
    }
}
