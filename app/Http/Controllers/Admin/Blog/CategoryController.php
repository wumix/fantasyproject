<?php

namespace App\Http\Controllers\Admin\Blog;

use App\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class CategoryController extends Controller {

    /**
     * Get a validator for an incoming request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $postId = NULL) {
        return Validator::make($data, [
                    'name' => 'required|max:255|unique:blog_categories',
                    'description' => 'required'
        ]);
    }

    public function index() {

        $data['posts'] = \App\BlogCategory::all()->toArray();
        return view('adminlte::blog.category_list', $data);
    }

    function addBlogCategory() {
        dd("blog category");
    }

    function addCategory() {

        return view('adminlte::blog.add_blog_category');
    }

    function postAddBlogCategory(Request $request) {
        $this->validator($request->all())->validate();
        $blogCategory = new \App\BlogCategory();
        $blogCategory->name = $request->name;
        $blogCategory->description = $request->description;
        $blogCategory->slug = slugify($request->name);
        $blogCategory->save();
        return view('adminlte::blog.add_blog_category');
    }

}
