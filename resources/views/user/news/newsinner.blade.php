@extends('layouts.app')
@section('facbook-og-tags')

    <meta property="og:url" content="{{Request::url()}}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{$postdetail['title']}}"/>
    <meta property="og:description" content="{!! str_limit($postdetail['description'], 100) !!}"/>
    <meta property="og:image" content="{{$postdetail['image']}}"/>
    <meta property="og:image:width" content="400"/>
    <meta property="og:image:height" content="400"/>
@stop
@section('title')
    <title>{{$postdetail['title']}}</title>
@stop
@section('facebook-share-div-code')
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9&appId=1736071000056030";
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
                    <section>
                        <div class="fb-share-button"
                             data-href="{{Request::url()}}"
                             data-layout="button" data-size="small"
                             data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore"
                                                          target="_blank"
                                                          href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url())}}&amp;src=sdkpreparse">Share</a></div>

                    </section>

                    <section class="col-md-12 no-padding" style="padding-bottom: 20px;">

                        <p class="blogcontent">

                            {!! $postdetail['content'] !!}

                        </p>



                    </section>




                </div>
                <div class='error' style='display:none'></div>
                <div id="sidebar" class="pull-right col-md-3 alt">
                    <div id="sidebar-widgets" class="four columns">
                        <div class="cols-md-12 form-group" id="sformbox">


                        </div>


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