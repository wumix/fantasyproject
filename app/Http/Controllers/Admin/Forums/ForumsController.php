<?php

namespace App\Http\Controllers\Admin\Forums;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ForumsController extends Controller
{
    function index(){
      //  $data['lists'] = \App\ForumCategory::where('is_approved',0)->with('children')->paginate(10);
        $data['lists'] = \App\ForumCategory::where('parent_id','!=',NULL)->with('children')->paginate(10);
        return view('adminlte::forums.home', $data);
    }
    function addCategory(Request $request){

        return view('adminlte::forums.category');
    }
    function approve(Request $request){
        //dd($request->all());

       $approve=\App\ForumCategory::where('id',$request->post_id);
       $approve->update(['is_approved'=>$request->is_approved]);




    }
    protected function validator(array $data)
    {
        return Validator::make($data, [


            'name' => 'required|unique:forum_categories',

        ]);
    }
    function addCategoryPost(Request $request){
       // dd($request->all());
        if($this->validator($request->all())->validate()) {
            $cat = new \App\ForumCategory;
            $cat->name = $request->name;
            $cat->is_approved = 1;
            $cat->slug = slugify($request->name);
            $cat->description = $request->description;
            $cat->created_at = getGmtTime();
            $cat->save();
        }else{
            redirect()->back();
        }
    }
    public  function listcategory(){
        $data['lists'] = \App\ForumCategory::where('parent_id',NULL)->with('children')->paginate(10);
        return view('adminlte::forums.list_cat', $data);
    }
    public function editCategory($id){
        $data['category'] = \App\ForumCategory::where('id',$id)->firstOrFail()->toArray();
     //   dd( $data['category'] );
        return view('adminlte::forums.category_edit',$data);
    }
    public function postEditCategory($id,Request $request){

        $request->request->remove('_token');
        $request->request->add(['created_at'=>getGmtTime()]);
        $edit_cat = new \App\ForumCategory;
        $edit_cat->where('id',$id)->update($request->all());
        return redirect()->back();

//        return view('adminlte::forums.category_edit',$data);
    }

}
