<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class NewsController extends Controller
{

public function showNewsDetail($id){
    $data['postdetail'] = \App\BlogPost::where('slug',$id)->firstOrFail()->toArray();

    return view('user.news.newsinner', $data);

}




}
