@extends('layouts.app')
{{--{{dd($matches->t)}}--}}
@section('title')
    Gamithon Fantasy
@stop
@section('css')
    <style>
        .section_area{
            background: url("{{URL::to('/img/topbanner.png')}}");
            height: 200px;
            position: relative;
        }
        .circle_area_for{
            width: 279px;
            height: 279px;
            line-height: 279px;
            display: inline-block;
            border-radius: 50%;
            margin-top: 41px;
        }
        .circle_area_for img{
            width: 279px;
            height: 279px;
            line-height: 279px;
            display: inline-block;
            border-radius: 50%;
            border:8px solid #fff;
        }
        .whole_area_section{
            width: 100%;
            display: inline-block;
            margin-top: 150px;

        }
        .abot_me{
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow: 0px 0px 27px rgba(0,0,0,0.21);
            padding: 0 29px;
            position: relative;
        }
        .abot_me_sec{
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow: 0px 0px 27px rgba(0,0,0,0.21);
            padding: 0 29px;
            margin-top: 50px;

        }
        .text_abot_me{
            width: 100%;
            display: inline-block;

            font-size: 15px;
            color: #030303;
            text-transform: uppercase;
            padding: 25px 0;
        }
        .parah_abot{
            width: 100%;
            display: inline-block;

            font-size: 15px;
            color: #a8a8a8;
            text-transform: uppercase;

            padding-bottom:25px;
        }
        .parah_abot1{
            width: 100%;
            display: inline-block;

            font-size: 15px;
            color: #a8a8a8;
            text-transform: uppercase;
        }
        .friends{
            width: 100%;
            display: none;

            font-size: 15px;
            color: #030303;
            text-transform: uppercase;
            margin-bottom: 20px;
        }
        .small_circle{
            width: 50px;
            height: 50px;
            line-height: 50px;
            display: inline-block;
            border-radius:50%;
            margin-right: 16px;
        }
        .small_circle img{
            width: 50px;
            height: 50px;
            line-height: 50px;
            display: inline-block;
            border-radius:50%;
        }
        .img_area{
            width: 100%;
            display: inline-block;
            text-align: center;
            margin-bottom: 50px;
        }
        .jhone{
            display: inline-block;

            font-size: 12px;
            color: #4b4b4b;
        }
        .btn_club{
            width: 174px;
            display: block;
            background: #92B713;
            padding: 12px 0;
            text-align: center;
            color: #fff;
            margin: 0 auto;
            border-radius: 38px;
            position: absolute;
            bottom: -17px;
            left: 83px;
        }
        .btn_club:hover {
            color: #333;

        }

        .img_area_area{
            width: 100%;
            display: inline-block;
            float: left;
            margin: 0;
            -webkit-margin-before: 0em;
            -webkit-margin-after: 0em;
            -webkit-margin-start: 0px;
            -webkit-margin-end: 0px;
            -webkit-padding-start: 0px;
            padding: 0;
        }

        .img_area_area li{
            width: 100%;
            display: inline-block;
            float: left;
            margin-bottom: 14px;
            text-align: center;
        }
        .right_sec{
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow: 0px 0px 27px rgba(0,0,0,0.21);
            padding: 22px 10px 0px 10px;
        }
        .right_sec_second{
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow: 0px 0px 27px rgba(0,0,0,0.21);
            padding: 22px 10px 0px 10px;
            margin-top: 30px;
        }
        .trophies{
            width: 100%;
            display: inline-block;

            font-size: 15px;
            color: #030303;
            text-transform: uppercase;
            border-bottom: 1px solid #b7b7b7;
            padding-bottom: 25px;
        }
        .plyer_one{
            display: inline-block;

            font-size: 15px;
            color: #030303;
            text-transform: uppercase;
            font-weight: bold;
            margin-left: 16px;
            padding-top: 38px;
        }
        .number_sec{
            display: inline-block;

            font-size: 70px;
            color: #8b8b8c;
            font-weight: bold;
            float: right;
        }
        .medal{
            width: 100%;
            display: inline-block;
            float: left;
            text-align: center;
        }
        .medal li{
            width: 33%;
            display: inline-block;
            float: left;
        }
        .medal li span{
            width: 100%;
            display: inline-block;
            text-align: center;

            font-size: 15px;
            font-weight: bold;
        }
        .upcoming_sec{
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow: 0px 0px 27px rgba(0,0,0,0.21);
            padding: 27px 24px 35px 30px;
            margin-top: 30px;
        }
        .text_abot_me_upcome{
            width: 100%;
            display: inline-block;
            border-bottom: 1px solid #b7b7b7;

            font-size: 15px;
            color: #030303;
            text-transform: uppercase;
        }
        .upcomin_list{
            width: 100%;
            display: inline-block;
            float: left;
            margin: 0;
            -webkit-margin-before: 0em;
            -webkit-margin-after: 0em;
            -webkit-margin-start: 0px;
            -webkit-margin-end: 0px;
            -webkit-padding-start: 0px;
        }
        .upcomin_list li{
            width: 100%;
            display: inline-block;
            float: left;
            margin-top: 30px;
            margin-bottom: 45px;
            border-bottom: 1px solid #b7b7b7;
            padding-bottom: 20px;
        }
        .upcomin_list li:nth-child(2){
            border-bottom: none;
            padding-bottom: 0px;
        }
        .left_upcoming{
            display: inline-block;
            float: left;
            width: 71%;
        }
        .right_upcoming{
            display: inline-block;
            float: right;
            width: 24%;
        }

        .text_abot_me_upcome_tour{
            width: 100%;
            display: inline-block;

            font-size: 15px;
            color: #030303;
            text-transform: uppercase;

        }
        .clor_text{
            width: 100%;
            display: inline-block;

            font-size: 12px;
            color: #818181;
            padding: 7px 0;
        }
        .time_area{
            width: 100%;
            display: inline-block;

            font-size: 21px;
            font-weight: bold;
            color: #28b23c;
            margin-bottom: 13px;
        }
        .more_btn{
            width: 100%;
            display: inline-block;

            font-size: 12px;
            color: #818181;
        }
        .sect{
            display: inline-block;
            float: right;
            width: 55%;
        }
        .nine_area{
            display: inline-block;

            font-size: 80px;
            color: #818181;
            font-weight: bold;
            float: right;
            position: relative;
        }
        .nine_area span{
            width: 100%;
            display: inline-block;

            font-size: 14px;
            margin-bottom: 0px;
            position: absolute;
            bottom: 0;
            left: 25px;
        }
        .owner_text{
            display: inline-block;

            font-size: 39px;
            color: #030303;
        }
        .owner_text span{
            width: 100%;
            display: inline-block;
            font-size: 17px;
            bottom: 0;

        }
        .text_con{
            width: 100%;
            display: inline-block;
            position: absolute;
            bottom: -80px;
            text-align: center;
            text-transform: uppercase;
        }
        @media all and (min-width: 961px) and (max-width: 1200px) {
            .right_sec{
                margin-top: 30px;
            }
            .upcoming_sec{
                margin-bottom: 50px;
            }
            .btn_club{
                left: 37%;
            }
            .circle_area_for img {
                width: 200px;
                height: 200px;
                line-height: 200px;
            }
        }

        @media all and (min-width: 769px) and (max-width: 960px) {
            .right_sec{
                margin-top: 30px;
            }
            .upcoming_sec{
                margin-bottom: 50px;
            }
            .btn_club{
                left: 37%;
            }
            .circle_area_for img {
                width: 200px;
                height: 200px;
                line-height: 200px;
            }
        }
        @media all and (min-width: 100px) and (max-width: 768px) {
            .right_sec{
                margin-top: 30px;
            }
            .upcoming_sec{
                margin-bottom: 50px;
            }
            .btn_club{
                left: 37%;
            }
            .circle_area_for img {
                width: 200px;
                height: 200px;
                line-height: 200px;
            }
            .owner_text {
                font-size: 30px;

            }
            .left_upcoming{
                width: 100%;
            }
        }
        @media all and (min-width: 100px) and (max-width: 480px) {
            .text_con{
                bottom: -123px;
            }
            .btn_club {
                left: 32%;
            }
            .sect {
                display: inline-block;
                float: right;
                width: 100%;
                margin-top: 30px;
            }
            element {
            }
            .img_area_area {
                width: 100%;
                display: inline-block;
                float: left;
                margin: 0;
                -webkit-margin-before: 0em !important;
                -webkit-margin-after: 0em !important;
                -webkit-margin-start: 0px !important;
                -webkit-margin-end: 0px !important;
                -webkit-padding-start: 0px !important;
            }
            .img_area_area li {
                width: 100%;
                display: inline-block;
                float: left;
                margin-bottom: 14px;
                text-align: center;
            }

        }

    </style>
@endsection
@section('content')
    <div class="section_area">
        <div class="text_con">
            <span class="owner_text">{{$userprofileinfo['name']}}</span>
        </div>
        <div class="container">
            <div class="row">

        <span class="circle_area_for">
            <img src="{{getUploadsPath($userprofileinfo['profile_pic'])}}" alt=""/>
        </span>

            </div>
        </div>
    </div>
    <div class="whole_area_section">

        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <div class="abot_me">
                    <span class="text_abot_me">
                        A Little about me
                    </span>
                        <p class="parah_abot">
                            @if(empty($userprofileinfo['about_me']))
                                Nothing About You yet
                            @else
                                {{$userprofileinfo['about_me']}}
                            @endif
                        </p>
                        {{--<span class="friends">--}}
                        {{--Friends</span>--}}
                        {{--<div class="img_area">--}}
                        {{--<span class="small_circle">--}}
                        {{--<img src={{URL::to('/img/small_circle.png')}} alt=""/>--}}
                        {{--<span class="jhone">Jhon Doe</span>--}}
                        {{--</span>--}}

                        {{--<span class="small_circle">--}}
                        {{--<img src={{URL::to('/img/small_circle.png')}} alt=""/>--}}
                        {{--<span class="jhone">Jhon Doe</span>--}}
                        {{--</span>--}}
                        {{--<span class="small_circle">--}}
                        {{--<img src={{URL::to('/img/small_circle.png')}} alt=""/>--}}
                        {{--<span class="jhone">Jhon Doe</span>--}}
                        {{--</span>--}}
                        {{--<span class="small_circle">--}}
                        {{--<img src={{URL::to('/img/small_circle.png')}} alt=""/>--}}
                        {{--<span class="jhone">Jhon Doe</span>--}}
                        {{--</span>--}}
                        {{--</div>--}}
                        <a href="{{route('userProfileEdit')}}" class="btn_club">Edit</a>
                    </div>
                    <div class="abot_me_sec">
                    <span class="text_abot_me">
                        Privious Tournament Score
                    </span>

                        <ul class="img_area_area">
                            <li>

                                IPL Score <span id="game_lame"> Calulating...</span>
                            </li>

                        </ul>

                    </div>
                </div>
                <div class="col-md-8 no-padding">
                    <div class="right_sec">
                        <div class="col-md-6">
                            <span class="trophies">Trophies</span>
                            <img src={{URL::to('/img/star.png')}} alt=""/>
                            <span class="plyer_one">Level 1 Player</span>
                            <span id="game_lame_1" class="number_sec">1</span>
                        </div>
                        <div class="col-md-6">
                            <ul class="medal">
                                <li id="exp">
                                    <img src={{URL::to('/img/gold-medal.png')}} alt=""/>
                                    {{--<span>20</span>--}}
                                </li>
                                {{--<li id="exp1">--}}
                                    {{--<img src={{URL::to('/img/gold-medal1.png')}} alt=""/>--}}
                                    {{--<span>10</span>--}}
                                {{--</li>--}}
                                {{--<li id="exp2">--}}
                                    {{--<img src={{URL::to('/img/gold-medal2.png')}} alt=""/>--}}
                                    {{--<span>00</span>--}}
                                {{--</li>--}}
                            </ul>

                        </div>
                    </div>

                    <div class="right_sec_second">

                        <div class="col-md-12">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <span class="trophies text-center">Your's Team</span>
                                {!! Form::open(['url' => route('teamdetail'),'method'=>'get']) !!}
                                <div class="form-group">
                                    <select id="team_id" style="width:100%;" name="team_id"
                                            class="form-control dropdown-toggle col-md-12"
                                            data-toggle="dropdown"
                                            style="border:1px solid #9acc59; border-radius: 6px;">

                                        @foreach($user_teams as $row)
                                            <option id="dropdownbtn"
                                                    value="{{$row['id']}}">{{$row['name']}}</option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group text-center">
                                    <button style="margin-top:10px;  " class="btn btn-success"
                                            type="submit">
                                        Go
                                    </button>
                                </div>

                                </form>
                            </div>
                            <div class="col-md-3">
                            </div>

                                </div>
                        {{--<div class="col-md-6">--}}
                        {{--<ul class="medal">--}}
                        {{--<li>--}}
                        {{--<img src={{URL::to('/img/gold-medal.png')}} alt=""/>--}}
                        {{--<span>20</span>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<img src={{URL::to('/img/gold-medal1.png')}} alt=""/>--}}
                        {{--<span>10</span>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<img src={{URL::to('/img/gold-medal2.png')}} alt=""/>--}}
                        {{--<span>00</span>--}}
                        {{--</li>--}}
                        {{--</ul>--}}

                        {{--</div>--}}
                    </div>
                    <div class="upcoming_sec">
                        <span class="text_abot_me_upcome">Upcoming Matches</span>
                        <div class="col-md-12">
                            <ul class="upcomin_list">
                                @foreach($upcommingTour as $tour)
                                    <li>
                                        <div class="left_upcoming">
                                            <span ><img src="{{URL::to('/img/upcomin_img.png')}}" alt=""/></span>
                                            <div class="sect">
                                                <span class="text_abot_me_upcome_tour">{{$tour['name']}}</span>
                                                <span class="clor_text">{{  formatDate($tour['start_date'])}}</span>
                                                <span class="time_area">{{formatDate($tour['start_date'])}}</span>
                                                <a href="{{route('fixturesdetail',['tournament_id'=>$tour['slug']])}}" class="more_btn">More Info  ></a>
                                            </div>
                                        </div>
                                        <div class="right_upcoming">
                             <span class="nine_area">
                           01
                            <span> June</span>
                        </span>
                                        </div>
                                    </li>
                                @endforeach
                                {{--<li>--}}
                                {{--<div class="left_upcoming">--}}
                                {{--<span ><img src="{{getUploadsPath($userprofileinfo['profile_pic'])}}" alt=""/></span>--}}
                                {{--<div class="sect">--}}
                                {{--<span class="text_abot_me_upcome_tour">Tournament of Football</span>--}}
                                {{--<span class="clor_text">Asghar Mall Scheme, Satellite Town, Rawalpindi</span>--}}
                                {{--<span class="time_area">09:00 - 10:45 pm</span>--}}
                                {{--<a href="#" class="more_btn">More Info  ></a>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="right_upcoming">--}}
                                {{--<span class="nine_area">--}}
                                {{--09--}}
                                {{--<span>APR</span>--}}
                                {{--</span>--}}
                                {{--</div>--}}
                                {{--</li>--}}

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>

        $(document).ready(function () {
            $("#team_id").each(function () {


                $("#game_lame").load("{{URL::to('/')}}" + "/user/team-detail?team_id=" + $(this).val() + " #total_team_score");
              //  $("#game_lame_1").load("{{URL::to('/')}}" + "/user/team-detail?team_id=" + $(this).val() + " #total_team_score");



            });


        });





    </script>
@endsection