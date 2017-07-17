<?php

namespace App\Http\Controllers\Forums;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ForumCategory;

class ForumController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {

        $data['categories'] = ForumCategory::with('children')->get()->toArray();
        return view('forum/index', $data);

    }

    public function cagetory($id)
    {
        $data['categories'] = ForumCategory::where('id', $id)->with('children')->first()->children;
        return view('forum/category', $data);

    }
    public function categoryPosts($id)
    {
        $data['posts'] = ForumCategory::where('id', $id)->with('posts')->first();
        //dd($data['posts']->toArray());
        return view('forum/posts', $data);
        //dd($data['posts']->toArray());

    }


}
