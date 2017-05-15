<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $data['posts'] = \App\BlogPost::where('post_type','post')->get()->toArray();
        return view('user.blog.blog', $data);
    }
function showBlogPostDetail($postid){

        $comments=\App\Comment::with('user')->get();
        $data['comments']=$comments->toArray();
       //dd($data['comments']);
           $data['posts'] = \App\BlogPost::where('post_type','post')->get()->toArray();

       $post=\App\BlogPost::findOrFail($postid);
       $data['postdetail']=$post->toArray();

    return view('user.blog.blog-inner', $data);
}
    function addcommentajax(Request $request){

    $comment=new Comment;
    $comment->content_id=$request->content_id;
        $comment->comment=$request->comment;
        $comment->user_id=\Auth::id();
        $comment->save();


        //joined_from_match_date -- I guess update team here
        $objResponse['success'] = true;
        $objResponse['comment'] =$request->comment;

        $objResponse['user_id'] =\Auth::id();
        $profile_pic=\App\User::where('id',\Auth::id())->firstOrFail()->toArray();
        $objResponse['name']=$profile_pic['name'];
        $objResponse['profile_pic']=getUploadsPath($profile_pic['profile_pic']);



        return response()->json($objResponse);





    }
}
