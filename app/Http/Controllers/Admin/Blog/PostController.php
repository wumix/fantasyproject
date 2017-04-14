<?php

namespace App\Http\Controllers\Admin\Blog;

use App\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        $data['posts'] = \App\BlogPost::all()->toArray();
        return view('adminlte::blog.blog_list', $data);
    }

    public function addBlogPost() {
        $data = [];
        $categories=\App\BlogCategory::all();
        $data['categories']=$categories->toArray();
        return view('adminlte::blog.blog_add', $data);
    }

    public function postAddBlogPost(Request $request) {
       // dd($request->all());

        $blopost=new \App\BlogPost();
        $blopost->title=$request->title;
        $blopost->slug=slugify($request->title);
        $blopost->description=$request->description;
        $blopost->content=$request->postdata;
        $blopost->image=$request->image;
        $blopost->save();
        $syncblog=\App\BlogPost::find($blopost->id);
        $syncblog->post_category()->sync(array_filter($request->category));
        $categories=\App\BlogCategory::all();
        $data['categories']=$categories->toArray();
        return view('adminlte::blog.blog_add',$data);


    }

}
