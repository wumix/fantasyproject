@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center page-heading">
                        BLOG
                    </h1>
                    <hr class="light full">

                </div>
            </div>
        </div>
    </section>
    <section class="no-padding">
        <div class="container ">
            <div class="row col-md-10 col-lg-offset-1" >
                <div class="col-md-8">
                    <div class="blogimg">
                        <img src="http://localhost/gamithon/public/img/portfolio/thumbnails/GALLERY-IMG6APR2.jpg" class="img-responsive" alt="Cinque Terre">
                    </div>
                    <section class="col-md-12 no-padding" style="padding-bottom: 20px;">
                        <h3 class="textgreen">
                            Bed ut
                        </h3>
                        <hr class="bloghr">
                        <div class="row" style="padding-right: 10px;">
                            <p class="bloginnertext col-md-7 col-md-offset-1" >
                                By Ahmad Mughal
                            </p >
                            <p class="text-right bloginnertext chattextico col-md-2"><i class="fa fa-comments" aria-hidden="true" style="color: #bbb8bf">12</i>

                            </p>
                            <div class="input-group sharebtnblogico col-md-3">
                                <button class="btn btn-xs sharebtnblog1" >
                                    <i class="fa fa-facebook " aria-hidden="true" style=" color: #ffffff;"></i>
                                </button>
                                <button class="btn btn-xs sharebtnblog" >Share on Facebook</button>
                            </div>
                        </div>
                        <hr class="bloghr">
                    </section>
                    <section class="col-md-12 no-padding" style="padding-bottom: 20px;">
                        <p class="blogcontent">

                           {!! $postdetail['content'] !!}
                        </p>
                    </section>

                    <section class="col-md-12 no-padding" style="padding-bottom: 20px;">
                        <h3 id="add-comment-in" class="textgreen">
                            COMMENTS
                        </h3>
                       @foreach($comments as $comment)
                        <div class="row" style="padding: 50px 0 20px 0;">
                            <div class="col-md-2">
                                <img src="{{getUploadsPath($comment['user']['profile_pic'])}}" class="circle1" style="padding: 0;" alt="Cinque Terre">

                            </div>
                            <div class="col-md-8 col-lg-offset-1"  >
                                <div class="row"><h4 class="textgreen col-md-2" >
                                        {{$comment['user']['name']}}
                                    </h4>
                                    <p class=" bloginnertext  col-md-8"><i class="fa fa-calendar" aria-hidden="true" style="color: #bbb8bf;padding-right: 10px;"></i>{{$comment['created_at']}}

                                    </p>

                                </div>
                            </div>
                            <div class="col-md-8 col-lg-offset-1"  >
                                <div class="row">
                                    <p class="blogcontent">
                                        {{$comment['comment']}}
                                           </p>

                                </div>


                            </div>

                        </div>
                        @endforeach

                    </section>
                    <hr class="bloghr">


                    <section class="col-md-12 no-padding" style="padding-bottom: 20px;">

                        <h3 class="textgreen">
                            Leave a reply
                        </h3>

                        <form id="add-comment" class="comment-form" novalidate="">

                            <div class="col-md-12 paddingtextarea">
                                @if(Auth::check())
                                <textarea  id="comment" class="bordercolor" placeholder="Comment (required)" name="comment" aria-required="true"  rows="10" tabindex="4"style="width: 100%"></textarea>
                                @else
                                    Login To comment
                                @endif
                            </div>

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
                            <div class="col-md-12 no-padding"><button name="submit" type="submit"  class="btn btn-lg btn1"> Submit Comment</button>

                            </div>
                            <!-- <div class="ceckbox">
                                <div class="form-group ceckbox">
                                    <input type="checkbox" class="form-group">
                                    <label class="bloginnertext " >
                                        Notify me of follow-up comments by email.</label></div>
                                <div class="form-group" style="margin-top: -10px;">
                                    <input type="checkbox">
                                    <label class="bloginnertext">
                                        Notify me of follow-up comments by email.</label></div>
                            </div> -->
                        </form>
                    </section>


                </div>
                <div class='error' style='display:none'></div>
                <div id="sidebar" class="pull-right col-md-3 alt">
                    <div id="sidebar-widgets" class="four columns">
                        <div class="cols-md-12 form-group" id="sformbox">




                        </div>
                        <div class=" blogheading">		<h4 class="textgreen">Poplar Post</h4>
                            <hr class="bloghr">
                            <ul class="nav navbd">
                                <li>
                                    <a href="#" class="bloglinkcolor">Et ta soeur, elle est artificielle ?</a>
                                </li>
                                <li>
                                    <a href="#" class="bloglinkcolor">Et ta soeur, elle est artificielle ?</a>
                                </li>
                                <li>
                                    <a href="#" class="bloglinkcolor">Et ta soeur, elle est artificielle ?</a>
                                </li>
                                <li>
                                    <a href="#" class="bloglinkcolor">Et ta soeur, elle est artificielle ?</a>
                                </li>
                                <li>
                                    <a href="#" class="bloglinkcolor">Et ta soeur, elle est artificielle ?</a>
                                </li>
                            </ul>
                        </div>
                        <div class="blogheading2"><h4 class="textgreen">Recent Post</h4>
                            <hr class="bloghr">
                            <ul class="nav navbd">
                                <li>
                                    <a href="#" class="bloglinkcolor ">Et ta soeur, elle est artificielle ?</a>
                                </li>
                                <li>
                                    <a href="#" class="bloglinkcolor">Et ta soeur, elle est artificielle ?</a>
                                </li>
                                <li>
                                    <a href="#" class="bloglinkcolor">Et ta soeur, elle est artificielle ?</a>
                                </li>
                                <li>
                                    <a href="#" class="bloglinkcolor">Et ta soeur, elle est artificielle ?</a>
                                </li>
                                <li>
                                    <a href="#" class="bloglinkcolor">Et ta soeur, elle est artificielle ?</a>
                                </li>
                            </ul>

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
                        var content="";
                        content += "  <div class=\"row\" style=\"padding: 50px 0 20px 0;\">";
                        content += "                            <div class=\"col-md-2\">";
                        content += "                                <img src=\""+data.profile_pic+" \" class=\"circle1\" style=\"padding: 0;\" alt=\"Cinque Terre\">";
                        content += "";
                        content += "                            <\/div>";
                        content += "                            <div class=\"col-md-8 col-lg-offset-1\"  >";
                        content += "                                <div class=\"row\"><h4 class=\"textgreen col-md-2\" >";
                        content+=""+data.name+""
                        content += "                                       ";
                        content += "                                    <\/h4>";
                        content += "                                    <p class=\" bloginnertext  col-md-8\"><i class=\"fa fa-calendar\" aria-hidden=\"true\" style=\"color: #bbb8bf;padding-right: 10px;\"><\/i>";
                        content += "";
                        content += "                                    <\/p>";
                        content += "";
                        content += "                                <\/div>";
                        content += "                            <\/div>";
                        content += "                            <div class=\"col-md-8 col-lg-offset-1\"  >";
                        content += "                                <div class=\"row\">";
                        content += "                                    <p class=\"blogcontent\">";
                        content+=""+comment+""
                        content += "                                       ";
                        content += "                                           <\/p>";
                        content += "";
                        content += "                                <\/div>";
                        content += "";
                        content += "";
                        content += "                            <\/div>";
                        content += "";
                        content += "                        <\/div>";

                        $( "#add-comment-in" ).after(content );




                        $('.error').html("comment added sucessfully");
                    $('.error').fadeIn(400).delay(2000).fadeOut(400);
                }


                }
            });
        });
    </script>
@endsection