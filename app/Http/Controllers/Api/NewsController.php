<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    //
    function index(){
        $news=\App\BlogPost::where('post_type','news')->
        orderBy('created_at','DESC')->get();
        foreach($news as &$new){
            $new['content']=strip_tags($new['content']);
        }
        return response()->json($news);

    }
}
