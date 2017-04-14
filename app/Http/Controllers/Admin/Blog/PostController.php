<?php

namespace App\Http\Controllers\Admin\Blog;

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
        return view('adminlte::blog.blog_add', $data);
    }

    public function postAddBlogPost() {
        
    }

}
