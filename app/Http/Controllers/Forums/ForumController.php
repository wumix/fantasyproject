<?php

namespace App\Http\Controllers\Forums;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Forum\ForumCategory;

class ForumController extends Controller
{
    public function __construct()
    {

    }
    public function index(){

        $data['categories'] = ForumCategory::with('children')->get()->toArray();
        return view('forum/index',$data);

    }
    public function cagetory($id){
        $data['categories'] = ForumCategory::where('id',$id)->with('children')->first()->children;
        //dd( $data['categories']);
        return view('forum/category',$data);

    }

}
