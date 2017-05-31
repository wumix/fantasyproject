@extends('layouts.app')
@section('facbook-og-tags')

    <meta property="og:url" content="{{Request::url()}}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{$postdetail['title']}}"/>
    <meta property="og:description" content="{!! str_limit($postdetail['description'], 100) !!}"/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="600"/>
    <meta property="og:image" content="{{$postdetail['image']}}"/>
    <meta property="fb:app_id" content="712839212231397"/>


@stop
@section('title')
    {{$postdetail['title']}}
@stop
@section('facebook-share-div-code')
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9&appId=712839212231397";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
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
            <div class="row col-md-12">
                <div class="col-md-8">
                    <div class="blogimg">
                        <img src="{{getUploadsPath($postdetail['image'])}}"
                             class="img-responsive" alt="Cinque Terre">
                    </div>
                    <section class="col-md-12 no-padding" style="padding-bottom: 20px;">

                    <!--  <h3 class="textgreen">
                            {!! $postdetail['title'] !!}

                            </h3>
                            <hr class="bloghr"> -->


                    </section>
                    <section>
                        <div class="fb-share-button"
                             data-href="{{Request::url()}}"
                             data-layout="button" data-size="small"
                             data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore"
                                                          target="_blank"
                                                          href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url())}}&amp;src=sdkpreparse">Share</a>
                        </div>

                    </section>
                    <section class="col-md-12 no-padding" style="padding-bottom: 20px;">
                        <p class="blogcontent">
                            {!! $postdetail['content'] !!}
                        </p>
                    </section>
                    <div class="fb-comments" data-href="https://www.facebook.com/gamithonfantasy/" data-width="100%"
                         data-numposts="5"></div>
                </div>
                <div id="sidebar" class="col-md-4 alt" style="margin-bottom: 40px;">
                    <div class="cols-md-12 ">
                        @foreach($news as $new)
                            <div class="media">
                                <div class="media-left media-middle">
                                    <a href="#">
                                        <img class="media-object"
                                             src="{{Croppa::url(getUploadsPath($new['image']),160,160)}}" alt="...">
                                    </a>
                                </div>

                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="{{route('newsdetail',['id'=>$new['slug']])}}">{{$new['title']}}</a>

                                    </h4>
                                    {!! str_limit($new['description'], 50) !!}...
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        /* go nawaz */
        $(".fb-comments").attr("data-href", window.location.href);
    </script>
@stop