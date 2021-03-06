<?php

namespace App\Http\Controllers\Admin\Blog;

use App\BlogCategory;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class PostController extends Controller
{

    public function __construct()
    {

    }

    /**
     * Get a validator for an incoming request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $postId = NULL)
    {
        return Validator::make($data, [
            'title' => 'required|max:255|unique:blog_posts,id' . $postId,
            'image' => 'required'
        ]);
    }

    public function index()
    {
        $data['blog_type'] = 'post';
        if (Input::get('post_type')) {
            $data['blog_type'] = Input::get('post_type');

        }

        $data['posts'] = \App\BlogPost::where('post_type', $data['blog_type'])
            ->orWhere('post_type', 'news')
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('adminlte::blog.blog_list', $data);
    }

    public function addBlogPost()
    {
        $data = [];
        $data['blog_type'] = 'post';
        if (Input::get('post_type')) {
            $data['blog_type'] = Input::get('post_type');

        }

        $categories = \App\BlogCategory::all();
        $data['categories'] = $categories->toArray();

        return view('adminlte::blog.blog_add', $data);
    }

    public function postAddBlogPost(Request $request, $blog_id = NULL)
    {
//echo $blog_id;
//  dd($request->all());
        $this->validator($request->all())->validate();
        if ($request->post_type == "post") {
            $blogPost = \App\BlogPost::updateOrCreate(
                ['id' => $blog_id], $request->all()
            );
        }
        if ($request->post_type == "news") {
            $blogPost = \App\BlogPost::updateOrCreate(
                ['id' => $blog_id], $request->all()
            );
        } else {
            $blogPost = \App\BlogPost::updateOrCreate(
                ['id' => $blog_id], $request->all()
            );
        }
        $syncblog = \App\BlogPost::find($blogPost->id);
        $syncblog->post_category()->sync($request->category);


        $flashMessage = (empty($blog_id)) ? 'Post added successfully.' : 'Post Updated';
        return redirect()->to(route('editPost', ['blog_id' => $blogPost->id]))
            ->with('status', $flashMessage);
    }


    public function editBlogPost(Request $request, $blog_id)
    {

        $data['categories'] = \App\BlogCategory::all()->toArray();
        $data['blog'] = \App\BlogPost::where('id', $blog_id)->with('post_category')->firstOrFail()->toArray();

        $data['selected_categories'] = [];
        if (!empty($data['blog']['post_category'])) {
            $data['selected_categories'] = array_column($data['blog']['post_category'], 'id');
        }
        return view('adminlte::blog.blog_edit', $data);
    }

    public function deleteBlogPost(Request $request)
    {
        $blog_id = $request->get('blogId');
        \App\BlogPost::find($blog_id)->delete();
        return response()->json([
            'deleted' => 'success'
        ]);
    }
}
