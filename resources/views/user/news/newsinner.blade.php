@extends('layouts.app')
@section('facbook-og-tags')

    <meta property="og:url"                content="{{Request::url()}}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{$postdetail['title']}}" />
    <meta property="og:description"        content="{!! str_limit($postdetail['description'], 100) !!}" />
    <meta property="og:image"              content="{{$postdetail['image']}}" />
    <meta property ="og:image:width" content="200px"/>
    <meta property ="og:image:height" content="200px"/>
@stop
@section('title')
    <title>{{$postdetail['title']}}</title>
@stop
@section('content')
    <style>
        p {
            word-wrap: break-word;
        }
    </style>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center page-heading">
                        {{$postdetail['title']}}
                    </h2>
                    <hr class="light full">

                </div>
            </div>
        </div>
    </section>
    <section class="no-padding">
        <div class="container ">
            <div class="row col-md-10 col-lg-offset-1">
                <div class="col-md-8">
                    <div class="blogimg">
                        <img src="{{$postdetail['image']}}"
                             class="img-responsive" alt="Cinque Terre">
                    </div>
                    <section class="col-md-12 no-padding" style="padding-bottom: 20px;">
                    <!--  <h3 class="textgreen">
                            {!! $postdetail['title'] !!}
                            </h3>
                            <hr class="bloghr"> -->


                    </section>
                    <section class="col-md-12 no-padding" style="padding-bottom: 20px;">
                        <p class="blogcontent">

                            {!! $postdetail['content'] !!}
                        </p>
                    </section>

                    {{--<section class="no-padding">--}}
                    {{--<h3 id="add-comment-in" class="textgreen">--}}
                    {{--COMMENTS--}}
                    {{--</h3>--}}
                    {{--@foreach($comments as $comment)--}}
                    {{--<div class="row">--}}
                    {{--<div class="col-md-12">--}}
                    {{--<div class="col-md-2">--}}
                    {{--<img--}}
                    {{--src="{{getUploadsPath($comment['user']['profile_pic'])}}"--}}
                    {{--class="img-thumbnail"--}}
                    {{--alt="Cinque Terre"--}}
                    {{-->--}}

                    {{--</div>--}}

                    {{--<div class="col-md-10 comment-text">--}}
                    {{--<h3 class="no-padding" style="margin-top: 5px;">{{$comment['user']['name']}}</h3>--}}
                    {{--<p class="blogcontent">--}}
                    {{--{!! $comment['comment'] !!}--}}
                    {{--</p>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<hr />--}}
                    {{--@endforeach--}}

                    {{--</section>--}}



                    {{--<section class="col-md-12 no-padding" style="padding-bottom: 20px;">--}}

                    {{--<h3 class="textgreen">--}}
                    {{--Leave a reply--}}
                    {{--</h3>--}}

                    {{--<form id="add-comment" class="comment-form" novalidate="">--}}

                    {{--<div class="col-md-12 paddingtextarea">--}}
                    {{--@if(Auth::check())--}}
                    {{--<textarea id="comment" class="bordercolor" placeholder="Comment (required)"--}}
                    {{--name="comment" aria-required="true" rows="10" tabindex="4"--}}
                    {{--style="width: 100%"></textarea>--}}
                    {{--@else--}}
                    {{--<a href="/login"> Login To comment</a>--}}
                    {{--@endif--}}
                    {{--</div>--}}

                    {{--<div class="row paddingtextarea">--}}
                    {{--<div class=" col-md-4">--}}

                    {{--<input type="text" class="form-control form-control1" name="name"  placeholder="Name (required)"/>--}}
                    {{--</div>--}}
                    {{--<div class=" col-md-4">--}}

                    {{--<input type="text" class="form-control form-control1" name="email"   placeholder=" Email (required)"/>--}}
                    {{--</div>--}}
                    {{--<div class=" col-md-4">--}}

                    {{--<input type="text" class="form-control form-control1" name="url"   placeholder=" Website"/>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-12 no-padding">--}}
                    {{--@if(Auth::check())--}}
                    {{--<button name="submit" type="submit" class="btn btn-lg btn1"> Submit Comment</button>--}}
                    {{--@endif--}}

                    {{--</div>--}}
                    {{--<!-- <div class="ceckbox">--}}
                    {{--<div class="form-group ceckbox">--}}
                    {{--<input type="checkbox" class="form-group">--}}
                    {{--<label class="bloginnertext " >--}}
                    {{--Notify me of follow-up comments by email.</label></div>--}}
                    {{--<div class="form-group" style="margin-top: -10px;">--}}
                    {{--<input type="checkbox">--}}
                    {{--<label class="bloginnertext">--}}
                    {{--Notify me of follow-up comments by email.</label></div>--}}
                    {{--</div> -->--}}
                    {{--</form>--}}
                    {{--</section>--}}


                </div>
                <div class='error' style='display:none'></div>
                <div id="sidebar" class="pull-right col-md-3 alt">
                    <div id="sidebar-widgets" class="four columns">
                        <div class="cols-md-12 form-group" id="sformbox">


                        </div>

                        {{--<div class="blogheading2"><h4 class="textgreen">Recent Post</h4>--}}
                        {{--<hr class="bloghr">--}}
                        {{--<ul class="nav navbd">--}}
                        {{--@foreach($posts as $post)--}}
                        {{--<li>--}}
                        {{--<a href="{{route('showBlogPostDetail',['post_id'=>$post['id']])}}" class="bloglinkcolor ">{{$post['title']}}</a>--}}
                        {{--</li>--}}
                        {{--@endforeach--}}
                        {{--</ul>--}}

                        {{--</div>--}}
                    </div>
                </div>

            </div>
        </div>
    </section>



@endsection
@section('js')
    <script>
        $("#add-comment").submit(function (event) {
            event.preventDefault();

            var comment = $("#comment").val();
            $.ajax({
                type: 'GET',
                url: '{{route('addcommentajax')}}',
                data: {content_id: '{{ $postdetail['id']}}', comment: comment},
                success: function (data) {
                    if (data.success == true) {
                        var content = "";
                        content += "<div class=\"row\">";
                        content += "                                <div class=\"col-md-12\">";
                        content += "                                    <div class=\"col-md-2\">";
                        content += "                                        <img";
                        content += "                                                src=\"" + data.profile_pic + "\"";
                        content += "                                                class=\"img-thumbnail\"";
                        content += "                                                alt=\"Cinque Terre\"";
                        content += "                                        >";
                        content += "";
                        content += "                                    <\/div>";
                        content += "";
                        content += "                                    <div class=\"col-md-10 comment-text\">";
                        content += "                                        <h3 class=\"no-padding\" style=\"margin-top: 5px;\">" + data.name + "<\/h3>";
                        content += "                                        <p class=\"blogcontent\">";
                        content += "                                            " + data.comment + "";
                        content += "                                        <\/p>";
                        content += "                                    <\/div>";
                        content += "                                <\/div>";
                        content += "                            <\/div>";
                        content += "                            <hr \/>";


                        $("#add-comment-in").after(content);


                        $('.error').html("comment added sucessfully");
                        $('.error').fadeIn(400).delay(2000).fadeOut(400);
                    }


                }
            });
        });
    </script>
@endsection