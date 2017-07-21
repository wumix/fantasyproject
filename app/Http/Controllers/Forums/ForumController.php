<?php

namespace App\Http\Controllers\Forums;

use App\ForumComment;
use App\ForumPost;
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

        $data['categories'] = ForumCategory::where('slug', $id)->with(['children'=>function($query){
            $query->where('is_approved',1);
        }])->first();
        //$data['parent_categories'] = ForumCategory::where('parent_id',NULL)->get()->toArray();
       // dd($data['categories']->toArray());
        return view('forum/category', $data);

    }
    public function addpost($id,Request $request){
       //dd($request->all());
        $form_cat=new ForumCategory;
        $form_cat->parent_id=$request->post_id;
        $form_cat->name=$request->title;
        $form_cat->description=$request->post_text;
        $form_cat->slug=slugify($request->title);

        $form_cat->save();
        //$formcat->


    }

    public function categoryPosts($id)
    {

        //dd($data['posts']->toArray());

        $data['posts'] = ForumCategory::where('slug',$id)->with(['posts.replies.user','posts.user'])->first();
     //   dd($data['posts']->toArray());
//       dd(\App\ForumPost::where('category_id',20)->get()->toArray());
      //  dd($data['posts']->toArray());
        return view('forum/posts', $data);
        //dd($data['posts']->toArray());

    }

    public function reply(Request $request)
    {
        //dd($request->all());
        //  $comment = new \App\ForumReply(array(['post_text',$request->post_text]));
        $post = \App\ForumPost::find($request->post_id);
        $post->replies()->insert(
            [
                'user_id' => '317',
                'post_id' => $request->post_id,
                'post_text' => $request->post_text,
                'created_at'=>getGmtTime(),
                'updated_at'=>getGmtTime()
            ]);

        return redirect()->back()
            ->with('msg', 'Added success');

    }
    public function edit(Request $request)
    {
      //  dd($request->all());
        //  $comment = new \App\ForumReply(array(['post_text',$request->post_text]));
        $post = \App\ForumPost::find($request->post_id);
        $post->replies()->insert(
            [
                'user_id' => '317',
                'name'=>$request->title,
                'post_id' => $request->post_id,
                'post_text' => $request->post_text,
                'created_at'=>getGmtTime(),
                'updated_at'=>getGmtTime()
            ]);

        return redirect()->back()
            ->with('msg', 'Added success');

    }

    //50:32:75:c9:db:f3


}
