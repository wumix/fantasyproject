@extends('layouts.app')
{{--{{dd($posts->toArray())}}--}}
@section('title')
    Gamithon Forums
@stop
@section('css')
    {!!  Html::style('assets-new/css/bootstrap3-wysihtml5.css'); !!}
    <style>
        .creat_topic_btn {
            width: 140px;
            display: inline-block;
            float: right;
            background: #8bc53f;
            color: #fff;
            padding: 12px 0;
            text-align: center;
            font-size: 13px;
            margin: 25px 39px 25px 0;
        }

        .image_circle_img img {
            height: 80px;
            width: 80px;
            line-height: 80px;
            border-radius: 50%;
            float: left;
        }

        .inner_area_section {
            background: #fff;
            box-shadow: 0px 0px 16px rgba(0, 0, 0, 0.21);
            padding: 24px;
            display: inline-block;
        }

        .heading {
            width: 60%;
            display: inline-block;
            font-weight: bold;
            font-size: 20px;
            margin-top: 23px;
            margin-left: 21px;
        }

        .hour_text {
            width: 8%;
            display: inline-block;
            font-size: 14px;
            color: #d3d3d3;
            margin-top: 23px;
        }

        .edit_btn {
            width: 20%;
            display: inline-block;
            font-size: 14px;
            color: #f6980e;
            float: right;
        }

        .edit_btn_edit {
            width: 35%;
            display: inline-block;
            font-size: 14px;
            color: #f6980e;
            padding-left: 22px;
        }

        .edit_btn_one {
            width: 10%;
            display: inline-block;
            font-size: 14px;
            color: #f6980e;
        }

        .edit_btn_two {
            width: 5%;
            display: inline-block;
            font-size: 14px;
            color: #f6980e;
            float: right;
        }

        .edit_btn_reply {
            width: 5%;
            display: inline-block;
            font-size: 14px;
            color: #f6980e;
            float: right;

        }

        .edit_btn_reply_second {
            width: 5%;
            display: inline-block;
            font-size: 14px;
            color: #f6980e;
            float: right;
        }

        .right_anqer_second {
            width: 30%;
            display: inline-block;
            float: right;
        }

        .edit_btn_one_quote {
            width: 10%;
            display: inline-block;
            font-size: 14px;
            color: #f6980e;
        }

        .edit_btn_edit_second {
            width: 35%;
            display: inline-block;
            font-size: 14px;
            color: #f6980e;
            padding-left: 22px;
        }

        .parah {
            width: 50%;
            display: inline-block;
            font-size: 16px;
            color: #999;
            margin-top: 0px;
            margin-left: 19px;
            float: left;
        }

        .list_icon {
            width: 100%;
            display: inline-block;
            float: left;
            padding: 0;
        }

        .list_icon li {
            width: 100%;
            display: inline-block;
            float: left;
            border-bottom: 1px solid #ccc;
            padding-bottom: 21px;
            margin-bottom: 25px;
        }

        .comment_area {
            width: 100%;
            display: inline-block;
        }

        .comment_area_second {
            width: 83%;
            display: inline-block;
            float: right;
            border-left: 3px solid #f6980e;
            padding: 20px;
        }

        .right_anqer {
            width: 30%;
            display: inline-block;
            float: right;
        }

        @media all and (min-width: 961px) and (max-width: 1200px) {
            .parah {
                width: 83%;
            }

            .edit_btn_two {
                width: 7%;
            }

            .right_anqer {
                width: 36%;
            }

            .edit_btn_reply {
                width: 9%;
            }

            .right_anqer_second {
                width: 38%;
            }

            .edit_btn_reply_second {
                width: 9%;
            }

            .edit_btn_one_quote {
                width: 22%;
            }

            .edit_btn_edit_second {
                width: 26%;
                padding-left: 0;
            }
        }

        @media all and (min-width: 768px) and (max-width: 960px) {
            .parah {
                width: 83%;
            }

            .edit_btn_two {
                width: 7%;
            }

            .right_anqer {
                width: 36%;
            }

            .edit_btn_reply {
                width: 9%;
            }

            .right_anqer_second {
                width: 38%;
            }

            .edit_btn_reply_second {
                width: 9%;
            }

            .edit_btn_one_quote {
                width: 22%;
            }

            .edit_btn_edit_second {
                width: 26%;
                padding-left: 0;
            }
        }

        @media all and (min-width: 100px) and (max-width: 768px) {
            .parah {
                width: 87%;
                margin-left: 94px;
            }

            .right_anqer {
                width: 47%;
            }

            .edit_btn_two {
                width: 8%;
            }

            .edit_btn_reply {
                width: 11%;
            }

            .right_anqer_second {
                width: 38%;
            }

            .edit_btn_reply_second {
                width: 11%;
            }

            .edit_btn_one_quote {
                width: 29%;
            }

            .edit_btn_edit_second {
                width: 26%;
                padding-left: 0;
            }
        }

        @media all and (min-width: 100px) and (max-width: 600px) {
            .right_anqer {
                width: 47%;
            }

            .edit_btn_reply {
                width: 11%;
            }

            .edit_btn_two {
                width: 12%;
            }

            .edit_btn_one {
                width: 14%;
            }

            .parah {
                width: 82%;
                text-align: justify;
            }

            .right_anqer_second {
                width: 55%;
            }

            .edit_btn_reply_second {
                width: 16%;
            }

            .edit_btn_one_quote {
                width: 29%;
            }

            .edit_btn_edit_second {
                width: 26%;
                padding-left: 0;
            }
        }

        @media all and (min-width: 100px) and (max-width: 480px) {
            .parah {
                width: 100%;
                text-align: justify;
                margin-left: 0px;
            }

            .heading {
                font-size: 16px;
                width: 45%;
            }

            .edit_btn_two {
                width: 22%;
            }

            .right_anqer {
                width: 70%;
                margin-bottom: 20px;
            }

            .edit_btn_one {
                width: 18%;
            }

            .edit_btn_reply {
                width: 29%;
            }

            .comment_area_second {
                width: 89%;
            }

            .right_anqer {
                width: 53%;
                margin-bottom: 20px;
                float: right;
            }

            .edit_btn_edit {
                width: 42%;
                padding-left: 0px;
            }

            .edit_btn_one {
                width: 52%;
            }

            .edit_btn_one {
                width: 39%;
            }

            .right_anqer_second {
                width: 53%;
            }

            .edit_btn_reply_second {
                width: 22%;
            }

            .edit_btn_one_quote {
                width: 42%;
            }

            .edit_btn_edit_second {
                width: 40%;
                padding-left: 0;
            }

            .image_circle_img img {
                margin-bottom: 13px;
            }

            .heading {
                font-size: 15px;
                width: 45%;
                margin-left: 11px;
            }
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 no-padding">
                <h1 class="page-heading">
                    {{$posts['name']}}
                </h1>
                <hr class="light full">
            </div>


            <div class="col-md-12 no-padding inner_area_section">

                @if(\Auth::check())
                <div class="col-md-12">
                    <button href="#" data-toggle="modal"
                            data-target="#create_topic" class="creat_topic_btn">Add Post
                    </button>
                </div>
                @endif

                <!---Section-start-->
                <ul class="list_icon">
                    @foreach($posts['posts'] as $post)
                        <li>
                            <div class="comment_area">
            <span class="image_circle_img">
                <img class="img-responsive " src="{{getUploadsPath($post['user']['profile_pic'])}}" alt=""/>
            </span>
                                <span class="heading">
               {{$post['user']['name']}}
            </span>
                                <span class="hour_text">
                                {{formatDate($post['date'])}}

            </span>
                                <div class="section_reply">
                                    <p id="reply-{{$post['id']}}" class="parah">
                                    {{$post['description']}}
                                    <div class="right_anqer">
                                        {{--<a href="#" class="edit_btn_one">Quote</a>--}}
                                        @if($post['user_id']==\Auth::id())
                                            <a href="#" data-id="{{$post['id']}}"
                                               data-target="#editModal" data-toggle="modal"
                                               class="edit_btn_edit" ><i class="fa fa-pencil" aria-hidden="true"></i>
                                                Edit</a>
                                        @endif
                                    </div>
                                    {{--<a href="#" class="edit_btn_two">Reply</a>--}}

                                    <a href="#" id="1" data-id="{{$post['id']}}" data-toggle="modal"
                                       data-target="#myModal" class="post_reply_button">Reply</a>

                                    </p>

                                </div>

                            </div>
                            @foreach($post['replies'] as $row)
                                <div class="comment_area_second">
            <span class="image_circle_img">
                <img class="img-responsive " src="{{getUploadsPath($row['user']['profile_pic'])}}" alt=""/>
            </span>
                                    <span class="heading">
                {{$row['user']['name']}}
            </span>
                                    <span class="hour_text">
                10h
            </span>

                                    <div class="section_reply">
                                        <p class="parah" id="repparah-{{$row['id']}}">

                                        {!! $row['post_text'] !!}

                                        <div class="right_anqer_second">
                                            {{--<a href="#" class="edit_btn_one_quote">Quote</a>--}}
                                            @if(\Auth::id()==$row['user_id'])
                                            <a href="#" data-id="{{$row['id']}}"
                                               data-target="#editReply" data-toggle="modal"
                                               class="edit_post_reply"><i class="fa fa-pencil" aria-hidden="true"></i>
                                                Edit </a>
                                                @endif

                                        </div>
                                        <a href="#" class="edit_btn_reply_second">Reply</a>

                                        </p>

                                    </div>
                                </div>
                            @endforeach
                        </li>
                    @endforeach
                </ul>
                <!---Section-End-->
            </div>
            <!--Section-new-start-->

            <!--Section-new-start-->
        </div>
    </div>
    <!-- Modal content-->
    <!-- REPLY FORM -->
    <div id="create_topic" class="modal fade in" role="dialog">
        <div class="modal-dialog">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-content">
                <div style='background-color: #009900;' class="modal-header">
                    <h4 class='modal-title' style="color:#fff;">
                        Add New Post
                    </h4>
                </div>

                <div class="modal-body">

                    {!! Form::open(['url' => route('addtopic',['cat_id'=>$posts['id']]),'method'=>'POST']) !!}
                    <div class="form-group">
                        <label>Title</label>
                        <input required type="text" name="title" class="form-control" placeholder="enter title here"/>
                    </div>
                    <div class="form-group">

                        <textarea required name="description" class="form-control"
                                  id="add_topic_textarea"
                                  placeholder="Write details "
                                  rows="6"></textarea>

                        {{--<textarea name="post_text" id="post-data"--}}
                        {{--style="height:200px;" class="form-control wysiwyg"></textarea>--}}
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                    {!! Form::close() !!}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- END FORM REPLY-->

            </div>


        </div>
    </div>
    <div id="myModal" class="modal fade in" role="dialog">
        <div class="modal-dialog">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-content">
                <div style='background-color: #009900;' class="modal-header">
                    <h4 class='modal-title' style="color:#fff;">
                        Add Reply
                    </h4>
                </div>

                <div class="modal-body">

                    {!! Form::open(['url' => route('reply'),'method'=>'POST']) !!}
                    <div class="form-group">

                        <textarea required name="post_text" class="form-control"
                                  id="post_rep_text_area"
                                  placeholder="Write details"
                                  rows="6"></textarea>

                    </div>

                    <input type="hidden" id="post_id" name="post_id" value=""/>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                    {!! Form::close() !!}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- END FORM REPLY-->

            </div>


        </div>
    </div>
    <div id="editModal" class="modal fade in" role="dialog">
        <div class="modal-dialog">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-content">
                <div style='background-color: #009900;' class="modal-header">
                    <h4 class='modal-title' style="color:#fff;">
                        Edit
                    </h4>
                </div>

                <div class="modal-body">

                    {!! Form::open(['url' => route('editpost'),'method'=>'POST']) !!}
                    <div class="form-group">

                        <textarea required name="post_text" class="form-control"
                                  id="edittextarea"
                                  placeholder="Write details "
                                  rows="6"></textarea>

                        {{--<textarea name="post_text" id="post-data"--}}
                        {{--style="height:200px;" class="form-control wysiwyg"></textarea>--}}
                    </div>

                    <input type="hidden" id="edit_post_id" name="post_id" value=""/>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    {!! Form::close() !!}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- END FORM REPLY-->

            </div>


        </div>
    </div>
    <div id="editReply" class="modal fade in" role="dialog">
        <div class="modal-dialog">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-content">
                <div style='background-color: #009900;' class="modal-header">
                    <h4 class='modal-title' style="color:#fff;">
                        zulfi edit reply
                    </h4>
                </div>

                <div class="modal-body">

                    {!! Form::open(['url' => route('editpostreply'),'method'=>'POST']) !!}
                    <div class="form-group">

                        <textarea required name="post_text" class="form-control"
                                  id="editreplytextarea"
                                  placeholder="Write details"
                                  rows="6"></textarea>

                        {{--<textarea name="post_text" id="post-data"--}}
                        {{--style="height:200px;" class="form-control wysiwyg"></textarea>--}}
                    </div>

                    <input type="hidden" id="edit_post_reply_id" name="post_id" value=""/>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    {!! Form::close() !!}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- END FORM REPLY-->

            </div>


        </div>
    </div>

    </div>

    </div>
    <!-- end model content -->
@endsection
@section('js')



    {!! Html::script('js/tinymce/tinymce.min.js'); !!}
    {!! Html::script('assets-new/js/wysihtml5.min.js');!!}
    {!! Html::script('assets-new/js/wysihtml5x-toolbar.min.js');!!}
    {!! Html::script('assets-new/js/handlebars.runtime.min.js');!!}

    <script>
        $(document).ready(function (){

//            $('#add_topic_textarea').wysihtml5({
//                "image": false,
//                "blockquote": true,
//                "lists": true
//            });
//            $('#post_rep_text_area').wysihtml5({
//                "image": false,
//                "blockquote": true,
//                "lists": true
//            });





        });

        $(document).on("click", ".post_reply_button", function () { //open reply form on post
            // $('#post-data').wysihtml5();


//            var liopo='border-r1-'+postId;
//            var t=($("#"+liopo).text());
            var postId = $(this).data('id');

            $(".modal-body #post_id").val(postId);

        });
        $(document).on("click", ".edit_btn_edit", function () { //open post edit


//            var liopo='border-r1-'+postId;
//            var t=($("#"+liopo).text());
//            alert(t);
            var postId = $(this).data('id');
            var k = $('#reply-' + postId).html();

            // alert(k);
            //$('edittextarea').html(k);

//            $('#edittextarea').wysihtml5({
//                "image": false,
//                "blockquote": true,
//                "lists": true
//            });
            $(".modal-body #edit_post_id").val(postId);

            $('#edittextarea').val(k);


        });

        $(document).on("click", ".edit_post_reply", function () { //open post edit
            // alert('asd');

//            var liopo='border-r1-'+postId;
//            var t=($("#"+liopo).text());
//            alert(t);
            var postId = $(this).data('id');
            var k = $('#repparah-' + postId).html();


           // alert(k);
            //$('edittextarea').html(k);




            $(".modal-body #edit_post_reply_id").val(postId);
            $('#editreplytextarea').val(k);
//            $('#editreplytextarea').wysihtml5({
//                "image": false,
//                "blockquote": true,
//                "lists": true
//            });


        });

    </script>

@endsection