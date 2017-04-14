<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $data['posts'] = \App\BlogPost::all()->toArray();
        return view('user.blog.blog', $data);
    }
function showBlogPostDetail($postid){
       $data['posts'] = \App\BlogPost::all()->toArray();
       $post=\App\BlogPost::findOrFail($postid);
       $data['postdetail']=$post->toArray();

    return view('user.blog.blog-inner', $data);
}
}
