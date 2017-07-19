<?php

namespace App\Http\Controllers\Admin\Forums;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForumsController extends Controller
{
    function index(){
        $data['lists'] = \App\ForumCategory::where('is_approved',0)->with('children')->paginate(10);
        return view('adminlte::forums.home', $data);
    }
}
