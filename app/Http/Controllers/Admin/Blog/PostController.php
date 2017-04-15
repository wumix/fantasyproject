<?php

namespace App\Http\Controllers\Admin\Blog;

use App\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class PostController extends Controller {

    public function __construct() {
        
    }

    /**
     * Get a validator for an incoming request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $postId = NULL) {
        return Validator::make($data, [
                    'title' => 'required|max:255|unique:blog_posts,id' . $postId,
                    'image' => 'required'
        ]);
    }

    public function index() {
        $data['blog_type'] = Input::get('post_type');
        $data['posts'] = \App\BlogPost::all()->toArray();
        return view('adminlte::blog.blog_list', $data);
    }

    public function addBlogPost() {
        $data = [];
        $categories = \App\BlogCategory::all();
        $data['categories'] = $categories->toArray();
        return view('adminlte::blog.blog_add', $data);
    }

    public function postAddBlogPost(Request $request, $blog_id = NULL) {
        $this->validator($request->all())->validate();
        $blogPost = \App\BlogPost::updateOrCreate(
                        ['id' => $blog_id], $request->all()
        );
        if (!empty($request->category)) {
            $syncblog = \App\BlogPost::find($blogPost->id);
            $syncblog->post_category()->sync(array_filter($request->category));
        }
        $flashMessage = (empty($blog_id)) ? 'Post added successfully.' : 'Post Updated';
        return redirect()->to(route('editPost', ['blog_id' => $blogPost->id]))
                        ->with('status', $flashMessage);
    }

    public function editBlogPost(Request $request, $blog_id) {
        $data['categories'] = \App\BlogCategory::all()->toArray();
        $data['blog'] = \App\BlogPost::where('id', $blog_id)->with('post_category')->firstOrFail()->toArray();

        $data['selected_categories'] = [];
        if (!empty($data['blog']['post_category'])) {
            $data['selected_categories'] = array_column($data['blog']['post_category'], 'id');
        }
        return view('adminlte::blog.blog_edit', $data);
    }

}
