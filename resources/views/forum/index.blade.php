@extends('layouts.app')
@section('title')
    Gamiton Forums
@stop
@section('css')
    <style>
        .new_topic_btn{
            width: 115px;
            float: right;
            padding: 10px 0;
            background: #95b700;
            color:#fff;
            text-align: center;
            border-radius: 6px;
            margin: 0px 97px 20px 0;
        }
        .forum_area_full{
            background: #fff;
            box-shadow: 0px 0px 16px rgba(0,0,0,0.21);
            margin-bottom: 26px;
        }
        .orang_forum{
            width: 30px;
            display: inline-block;
            float: left;
            background: #e48e1e;
        }
        .orang_forum_second{
            width: 95px;
            display: inline-block;
            float: right;
            background: #e48e1e;
        }
        .clip-bord{
            text-align: center;
            color: #fff;
            width: 100%;
            display: inline-block;
            font-size: 21px;
            margin-top: 41px;
            margin-bottom: 36px;
        }
        .clip-bord1{
            text-align: center;
            color: #fff;
            width: 100%;
            display: inline-block;
            font-size: 21px;
            margin-bottom: 52px;
        }
        .left_area_forum{
            width: 50%;
            display: inline-block;
            float: left;
        }
        .introduction_area{
            width: 85%;
            display: inline-block
        }
        .heading_forum span{
            width: 10%;
            display: inline-block;
            float: left;
            margin-top: 6px;
            margin-left: 16px;
        }
        .heading_forum{
            width: 100%;
            display: inline-block;
            font-size: 20px;
            color: #92b713;
            font-weight: bold;
            padding: 20px 0 0px 0;
        }
        .parah_forum{
            width: 100%;
            display: inline-block;
            color: #a5c345;
            margin-left: 12px;
            font-size: 14px;
            margin-bottom: 0;
        }
        .text_problem{
            color: #000;
            margin-left: 30px;
            padding: 16px 0;
            display: inline-block;
            font-size: 14px;
        }
        .grey_forum{
            width: 40px;
            display: inline-block;
            float: right;
            background: #e0dfdf;
        }
        .grey_forum_second{
            width: 40px;
            display: inline-block;
            float: left;
            background: #e0dfdf;
            border-left:2px solid #fff;
        }
        .topics_forum{
            font-size: 12px;
            color: #e48e1e;
            margin-bottom: 50px;
            margin-top: 22px;
            text-align: center;
            width: 100%;
            display: inline-block;
        }
        .topics_forum_num{
            font-size: 12px;
            color: #000;
            margin-bottom: 61px;
            margin-top: 22px;
            text-align: center;
            width: 100%;
            display: inline-block;
        }
        .topics_forum_num_second{
            font-size: 12px;
            color: #000;
            margin-bottom: 128px;
            margin-top: 22px;
            text-align: center;
            width: 100%;
            display: inline-block;
        }
        .introduction_area_secon{
            width: 100%;
            display: inline-block
        }
        .section_area_left_tyota_list{
            width: 100%;
            display: inline-block;
            float: left;
            padding: 0;
            margin-top: 20px;
            margin-bottom: 0;
        }
        .section_area_left_tyota_list li{
            width: 100%;
            display: inline-block;
            float: left;
            margin-bottom: 18px;
        }
        .img_left{
            width: 7%;
            display: inline-block;
            float: left;
            margin-left: 12px;
            margin-top: 6px;
        }
        .text_area{
            width: 88%;
            display: inline-block;
            float: right;
        }
        .left_li_section{
            width: 65%;
            display: inline-block;
            float: left;
        }
        .right_li_section{
            width: 35%;
            display: inline-block;
            float: right;
        }
        .date{
            color: #92b713;
        }
        .last_post_text{
            width: 100%;
            display: inline-block;
            text-align: center;
            font-size: 12px;
            color: #fff;
            margin-top: 20px;
            margin-bottom: 37px;
        }
        .head_forum{
            font-size: 12px;
            color: #000;
            width: 100%;
            display: inline-block;
            text-align: center;
            margin-bottom: 148px;
        }
        .area_handle{
            margin-top: 0 !important;
            display: inline-block ;
        }
        /*@media all and (min-width: 1200px) and (max-width: 1200px) {
        .area_handle {
            margin-top: 0px !important;
        }
        .grey_forum_second {
            border-left: 2px solid #fff !important;
        }
        .topics_forum_num_second {
            margin-bottom: 128px !important;
        }
        .head_forum {
            margin-bottom: 148px !important;
        }
        }*/
        @media all and (min-width: 961px) and (max-width: 1200px) {
            .forum_area_full {
                margin-top: 59px;
            }
            .area_handle {
                margin-top: 33px;
            }
            .grey_forum_second{
                border: none;
                height: 292px;
            }
            .topics_forum_num{
                margin-bottom: 128px;
            }
            .head_forum {
                margin-bottom: 147px;
            }
            .topics_forum_num_second {
                margin-bottom: 128px;
            }
            .orang_forum {
                width: 40px;
                height: 292px;
            }
            .grey_forum {
                width: 13%;
                height: 292px;
            }
            .orang_forum_second {
                width: 13%;
                height: 292px;
            }
            .introduction_area {
                width: 78%;
            }
            .left_li_section {
                width: 100%;
            }
            .right_li_section {
                width: 100%;
                text-align: center;
            }
            .section_area_left_tyota_list{
                margin-top: 12px;
            }
            .section_area_left_tyota_list li{
                margin-bottom: 10px;
            }
            .parah_forum {
                font-size: 15px;
            }
            .text_problem{
                margin-left: 6px;
                font-size: 13px;
            }
        }
        @media all and (min-width: 768px) and (max-width: 960px) {
            .forum_area_full {
                margin-top: 59px;
            }
            .area_handle {
                margin-top: 33px;
            }
            .grey_forum_second{
                border: none;
            }
            .topics_forum_num{
                margin-bottom: 128px;
            }
            .head_forum {
                margin-bottom: 147px;
            }
            .topics_forum_num_second {
                margin-bottom: 128px;
            }
            .orang_forum {
                width: 40px;
            }
            .grey_forum {
                width: 13%;
            }
            .orang_forum_second {
                width: 13%;
            }
            .introduction_area {
                width: 80%;
            }
            .parah_forum {
                font-size: 15px;
            }
            .text_problem{
                margin-left: 6px;
            }
        }
        @media all and (min-width: 100px) and (max-width: 768px) {
            .forum_area_full {
                margin-top: 0px;
            }
            .area_handle {
                margin-top: 33px;
            }
            .grey_forum_second{
                border: none;
            }
            .topics_forum_num{
                margin-bottom: 128px;
            }
            .head_forum {
                margin-bottom: 147px;
            }
            .topics_forum_num_second {
                margin-bottom: 145px;
            }
            .orang_forum {
                width: 40px;
            }
            .grey_forum {
                width: 13%;
            }
            .orang_forum_second {
                width: 13%;
            }
            .introduction_area {
                width: 80%;
            }
            .parah_forum {
                font-size: 15px;
            }
            .text_problem{
                margin-left: 6px;
            }
        }
        @media all and (min-width: 100px) and (max-width: 600px) {
            .parah_forum {
                font-size: 14px;
            }
            .introduction_area {
                width: 77%;
            }
            .left_li_section {
                width: 100%;
                margin-bottom: 11px;
            }
            .right_li_section {
                width: 100%;
                text-align: center;
            }
            .section_area_left_tyota_list {
                margin-top: 8px;
            }
            .text_problem {
                padding: 7px 0;
            }
            .section_area_left_tyota_list li{
                margin-bottom: 7px;
            }
            .orang_forum_second {
                height: 303px;
            }
            .grey_forum_second {
                height: 303px;
            }
        }
        @media all and (min-width: 100px) and (max-width: 480px) {
            .heading_forum {
                padding: 8px 0;
            }
            .introduction_area {
                width: 71%;
            }
            .text_problem{
                font-size: 12px;
            }
            .introduction_area_secon {
                width: 70%;
            }
            .text_area{
                font-size: 12px;
            }
            .img_left{
                margin-left: 8px;
            }
            .grey_forum {
                width: 16%;
            }
            .orang_forum_second {
                width: 16%;
            }
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-heading">
                    Forums
                </h1>
                <hr class="light full">
            </div>

            {{--<div class="col-md-12 ">--}}
                {{--<a href="#" class="new_topic_btn">New Topic</a>--}}
            {{--</div>--}}
            @foreach($categories as $cat )
            <div class="col-md-12 no-padding forum_area_full">
                <!---Section-start-->
                <div class="col-md-6 no-padding">
                    <div class="orang_forum">
                        <span class="clip-bord"><i class="fa fa-clipboard" aria-hidden="true"></i></span>
                        <span class="clip-bord1"><i class="fa fa-clipboard" aria-hidden="true"></i></span>
                    </div>
                    <div class="introduction_area">
                        <div class="heading_forum">
                        <span>
                            <img class="img-responsive " src={{URL::to('/img/arrow.png')}} alt=""/>
                        </span>
                          <a href="{{route('forumCategory',['id'=>$cat['slug']])}}" >{{$cat['name']}}</a>
                        </div>
                        {{--<a href="#" class="parah_forum">All discussion related to Honda --}}
                            {{--cars goes into this section.</a>--}}
                        <span class="text_problem">{{$cat['description']}}</span>
                        {{--<a href="#" class="parah_forum">All discussion related to Honda cars goes into this section.</a>--}}
                        {{--<span class="text_problem">to your problems, ask questions and talk about your Honda cars, all in o</span>--}}

                    </div>
                    <div class="grey_forum">
                        <span class="topics_forum">Topics</span>
                        <span class="topics_forum_num">{{count($cat['children'])}}</span>
                    </div>
                </div>
                <!---Section-End-->
                <!---Section-start-->
                <div class="col-md-6 no-padding area_handle">
                    {{--<div class="grey_forum_second">--}}
                        {{--<span class="topics_forum">Posts</span>--}}
                        {{--<span class="topics_forum_num_second">751</span>--}}
                    {{--</div>--}}

                    <div class="introduction_area_secon">

                        <ul class="section_area_left_tyota_list">
                            <?php $i=0?>
                            @foreach($cat['children'] as $child)
                            <li>
                                <div class="left_li_section">
                            <span class="img_left">
                                <img class="img-responsive " src={{URL::to('/img/toyata-arrow.png')}} alt=""/>
                            </span>
                                    <span class="text_area">
                                         <a href="{{route('categoryposts',['id'=>$child['slug']])}}" class="parah_forum">{{$child['name']}}</a>
                            </span>
                                </div>
                                <div class="right_li_section">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span class="date">{{formatDate($child['created_at'])}}</span>
                                    <span class="date">{{formatTime($child['created_at'])}}</span>
                                </div>
                            </li>
                                <?php if($i==3){
                                        break;
                                    } else{
                                    $i++;
                                    }

                                ?>
                            @endforeach

                        </ul>
                    </div>
                    <div class="orang_forum_second">
                        {{--<span class="last_post_text">Last Post</span>--}}
                        {{--<span class="head_forum">--}}
                        {{--Today 10:32 pm--}}
                    {{--by Arsalan--}}
                    {{--</span>--}}
                    </div>
                </div>
                <!---Section-End-->
            </div>
            <!--Section-new-start-->
            @endforeach

                <!---Section-End-->

            </div>
            <!---->
        </div>
    </div>

@endsection