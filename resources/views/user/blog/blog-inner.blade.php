@extends('layouts.app')

@section('content')
    <meta property="og:url"                content="http://gamithonfantasy.com/" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content=" {{$postdetail['title']}}" />
    <meta property="og:description"        content="This is gamithon Fantasy" />
    <meta property="og:image"              content="{{getUploadsPath($postdetail['image'])}}"

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center page-heading">
                        Gamithon Gossips
                    </h1>
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
                        <img src="{{getUploadsPath($postdetail['image'])}}"
                             class="img-responsive" alt="Cinque Terre">
                    </div>
                    <section class="col-md-12 no-padding" style="padding-bottom: 20px;">
                        <h3 class="textgreen">
                            {{$postdetail['title']}}
                        </h3>
                        <hr class="bloghr">
                        <div class="row" style="padding-right: 10px;">
                            <p class="bloginnertext col-md-7 col-md-offset-1">
                                {{--By Admin--}}
                            </p>

                            <p class="text-right bloginnertext chattextico col-md-2">
                            <div id="fb-root"></div>
                            <script>(function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s); js.id = id;
                                    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9&appId=1736071000056030";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                            <div class="fb-share-button" data-href="http://www.gamithonfantasy.com" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.gamithonfantasy.com%2F&amp;src=sdkpreparse">Share</a></div>

                            </p>

                        </div>
                        <hr class="bloghr">
                    </section>
                    <section class="col-md-12 no-padding" style="padding-bottom: 20px;">
                        <p class="blogcontent">
                            {!! $postdetail['content'] !!}

                        </p>

                    </section>

                    <hr class="bloghr">
                    {{--<section class="col-md-12 no-padding" style="padding-bottom: 20px;">--}}

                    {{--<h3 class="textgreen">--}}
                    {{--Leave a reply--}}
                    {{--</h3>--}}

                    {{--<form class="comment-form" novalidate="">--}}

                    {{--<div class="col-md-12 paddingtextarea">--}}

                    {{--<textarea class="bordercolor" placeholder="Comment (required)" name="comment" aria-required="true"  rows="10" tabindex="4"style="width: 100%"></textarea>--}}
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
                    {{--<div class="col-md-12 no-padding"><button name="submit" type="submit"  class="btn btn-lg btn1"> Submit Comment</button>--}}

                    {{--</div>--}}
                    {{--<div class="ceckbox">--}}
                    {{--<div class="form-group ceckbox">--}}
                    {{--<input type="checkbox" class="form-group">--}}
                    {{--<label class="bloginnertext " >--}}
                    {{--Notify me of follow-up comments by email.</label></div>--}}
                    {{--<div class="form-group" style="margin-top: -10px;">--}}
                    {{--<input type="checkbox">--}}
                    {{--<label class="bloginnertext">--}}
                    {{--Notify me of follow-up comments by email.</label></div>--}}
                    {{--</div>--}}
                    {{--</form>--}}
                    {{--</section>--}}

                </div>
                <div id="sidebar" class="pull-right col-md-3 alt">
                    <div id="sidebar-widgets" class="four columns">
                        <div class="cols-md-12 form-group" id="sformbox">


                        </div>
                        {{--<div class=" blogheading">		<h4 class="textgreen">Poplar Post</h4>--}}
                        {{--<hr class="bloghr">--}}
                        {{--<ul class="nav navbd">--}}
                        {{--<li class="as">--}}
                        {{--<a href="#" class="bloglinkcolor">Et ta soeur, elle est artificielle ?</a>--}}
                        {{--</li>--}}
                        {{--<li class="as">--}}
                        {{--<a href="#" class="bloglinkcolor">Et ta soeur, elle est artificielle ?</a>--}}
                        {{--</li>--}}
                        {{--<li class="as">--}}
                        {{--<a href="#" class="bloglinkcolor">Et ta soeur, elle est artificielle ?</a>--}}
                        {{--</li>--}}
                        {{--<li class="as">--}}
                        {{--<a href="#" class="bloglinkcolor">Et ta soeur, elle est artificielle ?</a>--}}
                        {{--</li>--}}
                        {{--<li class="as">--}}
                        {{--<a href="#" class="bloglinkcolor">Et ta soeur, elle est artificielle ?</a>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        <div class="blogheading2"><h4 class="textgreen">Recent Post</h4>
                            <hr class="bloghr">
                            <ul class="nav navbd">
                                @foreach($posts as $row)
                                    <li class="as">
                                        <a href="{{route('showBlogPostDetail',['post_id'=>$row['id']])}}" class="bloglinkcolor ">{{$row['title']}}</a>
                                    </li>

                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>




@endsection
