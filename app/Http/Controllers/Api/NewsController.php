<?php

namespace App\Http\Controllers\Api;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class NewsController extends Controller
{
    //
    function index(Request $request){
        $news_id=$request->id;
        if(empty($news_id)) {

            if($request->post_type=="news"){
            $news = \App\BlogPost::where('post_type', 'news')->
            orderBy('created_at', 'DESC')->get();

            }else{
                $news = \App\BlogPost::where('post_type', 'post')->
                orderBy('created_at', 'DESC')->get();

            }
            foreach ($news as &$new) {
                $new['content'] = strip_tags($new['content']);
                $new['content'] = stripslashes($new['content']);
                $str = $new['content'];
                $order = array("\r\n", "\n", "\r", "<p>", "\\", "</p>", ";&nbsp", "&nbsp;", "<br />", "&rdquo;");
                $replace = '';
                $new['content'] = str_replace($order, $replace, $str);

            }
        }else{
            $news = \App\BlogPost::where('post_type', 'news')->where('id',$news_id)->first();
            $news['content'] = strip_tags($news['content']);
            $news['content'] = stripslashes($news['content']);
            $str = $news['content'];
            $order = array("\r\n", "\n", "\r", "<p>", "\\", "</p>", ";&nbsp", "&nbsp;", "<br />", "&rdquo;");
            $replace = '';
            $news['content'] = str_replace($order, $replace, $str);

        }
        $data['news']=$news;
        return response()->json($data);

    }


}
