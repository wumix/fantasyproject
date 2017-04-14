<?php

namespace App\Http\Controllers\Admin\Blog;

use App\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index()
    {

        $data['posts'] = \App\BlogCategory::all()->toArray();
        return view('adminlte::blog.category_list', $data);

    }

    function addBlogCategory()
    {
        dd("blog category");
    }
    function addCategory(){

        return view('adminlte::blog.add_blog_category');



    }
    function postAddBlogCategory(Request $request)
    {

        $blogCategory=new \App\BlogCategory();
        $blogCategory->name=$request->name;
        $blogCategory->description=$request->description;
        $blogCategory->slug=slugify($request->name);
        $blogCategory->save();
        return view('adminlte::blog.add_blog_category');


    }

}
