<?php

namespace App\Http\Controllers\Forums;

use App\ForumComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ForumCategory;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {

        $data['categories'] = ForumCategory::where('parent_id',NULL)->with('children')->get()->toArray();
       //dd($data['categories']);
        return view('forum/index', $data);

    }

    public function cagetory($id)
    {

        $data['categories'] = ForumCategory::where('slug', $id)->with('children')->first()->children;
       // dd($data['categories']->toArray());
        return view('forum/category', $data);

    }

    public function categoryPosts($id)
    {

        //dd($data['posts']->toArray());

        $data['posts'] = ForumCategory::where('slug',$id)->with('posts')->first();
//       dd(\App\ForumPost::where('category_id',20)->get()->toArray());
      //  dd($data['posts']->toArray());
        return view('forum/posts', $data);
        //dd($data['posts']->toArray());

    }

    public function reply(Request $request)
    {
        //  $comment = new \App\ForumReply(array(['post_text',$request->post_text]));
        $post = \App\ForumPost::find($request->post_id);
        $post->replies()->insert(
            [
                'user_id' => 4,
                'post_id' => $request->post_id,
                'post_text' => $request->post_text,
                'created_at'=>getGmtTime(),
                'updated_at'=>getGmtTime()
            ]);

        dd('asd');

    }
    //50:32:75:c9:db:f3


}
