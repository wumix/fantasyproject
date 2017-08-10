@extends('layouts.app')
{{--{{dd($user_teams)}}--}}
@section('title')
    Gamithon Fantasy
@stop
@section('css')
    <style>
        .btn-dash {
            display: block;
            width: 150px;
            margin: 0 auto !important;
            font-family: 'Open Sans', 'Helvetica Neue', Arial, sans-serif;
            border: none;
            border-radius: 5px;
            font-weight: 400;
            background: #92B713 !important;
            text-transform: capitalize;
        }

        .highlight-badge {
            border: 2px solid #F98709;
            padding: 2px;
        }

        .btn-gamithon-default {
            background: #92B713 !important;
        }

        .upcomin_list {
            margin: 0;
            padding: 0;
        }

        .section_area {
            background: url("{{URL::to('/img/topbanner.png')}}");
            height: 200px;
            position: relative;
        }

        .circle_area_for {
            width: 175px;
            height: 175px;
            line-height: 279px;
            display: inline-block;
            border-radius: 50%;
            margin-top: 41px;
        }

        .lvl-text {
            font-size: 20px;
            color: #F9980E;
        }

        .circle_area_for img {
            width: 175px;
            height: 175px;
            line-height: 279px;
            display: inline-block;
            border-radius: 50%;
            border: 8px solid #fff;
            box-shadow: 2px 5px 10px 0px #CECECE;
        }

        .whole_area_section {
            width: 100%;
            display: inline-block;
            margin-top: 110px;

        }

        .abot_me {
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow: 0px 0px 27px rgba(0, 0, 0, 0.21);
            padding: 0 29px;
            position: relative;
            margin-bottom: 40px;
        }

        .rfral_code {
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow: 0px 0px 27px rgba(0, 0, 0, 0.21);
            padding: 20px 20px;
            margin-bottom: 40px;
        }

        .new_form {
            width: 213px !important;
            border: 1px solid #92B713;
            height: 42px;
        }

        .js-textareacopybtn {
            padding: 11px;
            width: 76px;
            background: #5cb85c;
            color: #fff;
        }

        .abot_me_sec {
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow: 0px 0px 27px rgba(0, 0, 0, 0.21);
            padding: 0 29px;
            margin-bottom: 40px;
        }

        .abot_me_sec1 {
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow: 0px 0px 27px rgba(0, 0, 0, 0.21);
            padding: 0 29px;
            margin-bottom: 40px;
        }

        .share_text_area {
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow: 0px 0px 27px rgba(0, 0, 0, 0.21);
            padding: 0 29px;

        }

        .abot_me_sec2 {
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow: 0px 0px 27px rgba(0, 0, 0, 0.21);
            padding: 0 29px;
        }

        .text_abot_me {
            width: 100%;
            display: inline-block;

            font-size: 15px;
            color: #030303;
            text-transform: uppercase;
            padding: 25px 0;
        }

        .parah_abot {
            width: 100%;
            display: inline-block;

            font-size: 15px;
            color: #a8a8a8;
            text-transform: uppercase;

            padding-bottom: 25px;
        }

        .parah_abot1 {
            width: 100%;
            display: inline-block;

            font-size: 15px;
            color: #a8a8a8;
            text-transform: uppercase;
        }

        .friends {
            width: 100%;
            display: none;

            font-size: 15px;
            color: #030303;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .small_circle {
            width: 50px;
            height: 50px;
            line-height: 50px;
            display: inline-block;
            border-radius: 50%;
            margin-right: 16px;
        }

        .small_circle img {
            width: 50px;
            height: 50px;
            line-height: 50px;
            display: inline-block;
            border-radius: 50%;
        }

        .img_area {
            width: 100%;
            display: inline-block;
            text-align: center;
            margin-bottom: 50px;
        }

        .jhone {
            display: inline-block;

            font-size: 12px;
            color: #4b4b4b;
        }

        .btn_club {
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

        .img_area_area {
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

        .img_area_area li {
            width: 100%;
            display: inline-block;
            float: left;
            margin-bottom: 14px;
            text-align: center;
        }

        .right_sec {
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow: 0px 0px 27px rgba(0, 0, 0, 0.21);
            padding: 16px 0;
            margin-bottom: 30px;
        }

        .right_sec_second {
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow: 0px 0px 27px rgba(0, 0, 0, 0.21);
            padding: 22px 10px 0px 10px;
        }

        .trophies {
            width: 100%;
            display: inline-block;

            font-size: 15px;
            color: #030303;
            text-transform: uppercase;
            border-bottom: 1px solid #b7b7b7;
            padding-bottom: 25px;
        }

        .plyer_one {
            display: inline-block;

            font-size: 15px;
            color: #030303;
            text-transform: uppercase;
            font-weight: bold;
            margin-left: 16px;
            padding-top: 38px;
        }

        .number_sec {
            display: inline-block;

            font-size: 70px;
            color: #8b8b8c;
            font-weight: bold;
            float: right;
        }

        .medal {
            width: 100%;
            display: inline-block;
            float: left;
            text-align: center;
        }

        .medal li {
            width: 33%;
            display: inline-block;
            float: left;
        }

        .medal li span {
            width: 100%;
            display: inline-block;
            text-align: center;

            font-size: 15px;
            font-weight: bold;
        }

        .upcoming_sec {
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow: 0px 0px 27px rgba(0, 0, 0, 0.21);
            padding: 27px 24px 35px 30px;
            margin-top: 30px;
        }

        .text_abot_me_upcome {
            width: 100%;
            display: inline-block;
            border-bottom: 1px solid #b7b7b7;

            font-size: 15px;
            color: #030303;
            text-transform: uppercase;
        }

        .upcomin_list li {
            list-style: none;
            padding: 20px 0;
        }

        .upcomin_list li:nth-child(2) {
            border-bottom: none;
            padding-bottom: 0px;
        }

        .left_upcoming {
            display: inline-block;
            float: left;
            width: 71%;
        }

        .right_upcoming {
            display: inline-block;
            float: right;
            width: 24%;
        }

        .text_abot_me_upcome_tour {
            width: 100%;
            display: inline-block;

            font-size: 15px;
            color: #030303;
            text-transform: uppercase;

        }

        .clor_text {
            width: 100%;
            display: inline-block;

            font-size: 12px;
            color: #818181;
            padding: 7px 0;
        }

        .time_area {
            width: 100%;
            display: inline-block;

            font-size: 21px;
            font-weight: bold;
            color: #28b23c;
            margin-bottom: 13px;
        }

        .more_btn {
            width: 100%;
            display: inline-block;

            font-size: 12px;
            color: #818181;
        }

        .sect {
            display: inline-block;
            float: right;
            width: 55%;
        }

        .nine_area {
            display: inline-block;

            font-size: 80px;
            color: #818181;
            font-weight: bold;
            float: right;
            position: relative;
        }

        .nine_area span {
            width: 100%;
            display: inline-block;

            font-size: 14px;
            margin-bottom: 0px;
            position: absolute;
            bottom: 0;
            left: 25px;
        }

        .owner_text {
            display: inline-block;

            font-size: 39px;
            color: #030303;
        }

        .owner_text span {
            width: 100%;
            display: inline-block;
            font-size: 17px;
            bottom: 0;

        }

        .text_con {
            width: 100%;
            display: inline-block;
            position: absolute;
            bottom: -80px;
            text-align: center;
            text-transform: uppercase;
        }

        @media all and (min-width: 961px) and (max-width: 1200px) {

            .upcoming_sec {
                margin-bottom: 50px;
            }

            .btn_club {
                left: 20%;
            }

            .circle_area_for img {
                width: 200px;
                height: 200px;
                line-height: 200px;
            }
        }

        @media all and (min-width: 769px) and (max-width: 960px) {
            .owner_text {
                font-size: 27px;
            }

            .right_sec {
                margin-top: 30px;
            }

            .upcoming_sec {
                margin-bottom: 50px;
            }

            .btn_club {
                left: 37%;
            }

            .circle_area_for img {
                width: 200px;
                height: 200px;
                line-height: 200px;
            }
        }

        @media all and (min-width: 100px) and (max-width: 768px) {
            .owner_text {
                font-size: 19px;
                font-weight: bold;
            }

            .right_sec {
                margin-top: 30px;
            }

            .upcoming_sec {
                margin-bottom: 50px;
            }

            .btn_club {
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

            .left_upcoming {
                width: 100%;
            }

            .abot_me {
                margin-top: 25px;
            }

        }

        @media all and (min-width: 100px) and (max-width: 480px) {
            .owner_text {
                font-size: 15px;
                font-weight: bold;
            }

            .btn_club {
                left: 20%;
            }

            .text_con {
                bottom: -123px;
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
                    <span class="text_abot_me text-center">
                         Tournament Scores
                    </span>

                        <ul class="img_area_area">
                            @foreach($user_scores['leaderboard'] as $score)
                                @if(!empty($score['tournament']))
                                    <li>
                                        {{$score['tournament']['name']}}: <strong>{{$score['score']}}</strong>

                                    </li>
                                @endif
                            @endforeach

                        </ul>
                    </div>
                    <div class="rfral_code" style="display:none;">

                        <div class="col-lg-12">
                            <span class="text_abot_me text-center">
                         Share and win 5000 points
                    </span>
                            <div class="input-group">
                                <input type="text"
                                       value="{{ URL::to('/')}}/signup/?referral_key={{$userprofileinfo['referral_key']}}"
                                       class="js-copytextarea form-control new_form"
                                       onclick="select()"
                                       readonly
                                       id="ref_link"
                                >
                                <span class="input-group-btn">
        <button class="btn btn-secondary js-textareacopybtn" data-clipboard-target="#ref_link"
                type="button">Copy referral code</button>
      </span>
                            </div>
                        </div>
                    </div>

                    @if(!empty($challenges[0]['challenges']))
                        <div class="abot_me_sec1">
                    <span class="text_abot_me text-center">
                        InActive Challenges
                    </span>
                            @include('adminlte::layouts.form_errors')

                            @foreach($challenges as $val)
                                @foreach($val['challenges'] as $row)
                                    <ul class="img_area_area">
                                        <li>

                                            Name <span id="game_lame">{{$row['user']['name']}}</span>
                                        </li>
                                        <li>
                                            Reward: <span id="game_lame">{{$row['rewards']}}</span>
                                            <a href="{{route('accept_challenge',['id'=>$row['id']])}}">Accept</a>
                                        </li>


                                    </ul>
                                @endforeach
                            @endforeach

                        </div>
                    @endif
                    @if(!empty($accepted_challenges[0]['challenges']))
                        <div class="abot_me_sec2">
                    <span class="text_abot_me text-center">
                        Active Chanllenges
                    </span>
                            @include('adminlte::layouts.form_errors')

                            @foreach($accepted_challenges as $val)
                                @foreach($val['challenges'] as $row)
                                    <ul class="img_area_area">
                                        <li>

                                            Vs <span id="game_lame">{{$row['user']['name']}}</span>
                                        </li>
                                        <li>
                                            Reward: <span id="game_lame">{{$row['rewards']}}</span>
                                            <span id="game_lame">
                                        @if($row['status']==0)
                                                    In progress
                                                @endif
                                                @if($row['status']==1)
                                                    Won
                                                @endif
                                                @if($row['status']==2)
                                                    Lost
                                                @endif
                                        </span>
                                        </li>


                                    </ul>
                                @endforeach
                            @endforeach

                        </div>
                    @endif
                </div>
                <div class="col-md-8 no-padding">
                    <div class="right_sec">
                        <div class="col-md-6">
                            <span class="trophies">Trophies</span>
                            <img src={{URL::to('/img/star.png')}} alt=""/>
                            <span class="plyer_one">
                                Your level is <span class="lvl-text">Beginner</span>
                            </span>

                            {{--<span class="plyer_one">--}}
                            {{--<span class="lvl-text"><a--}}
                            {{--href="{{route('challenges')}}">Challenge Other Players</a> </span>--}}
                            {{--</span>--}}

                        </div>
                        <div class="col-md-6">
                            <ul class="medal">
                                <li id="exp" class="<?php $user_ranking == 1 ? 'highlight-badge' : '' ?>">
                                    <img src={{URL::to('/img/gold-medal.png')}} alt=""/>
                                    <span>
                                        <?php echo $user_ranking == 1 ? '01' : '00' ?>
                                    </span>
                                </li>
                                <li class="<?php $user_ranking == 2 ? 'highlight-badge' : '' ?>">
                                    <img class="" src={{URL::to('/img/gold-medal1.png')}} alt=""/>
                                    <span>
                                         <?php echo $user_ranking == 2 ? '01' : '00' ?>
                                    </span>
                                </li>
                                <li id="exp2" class="<?php $user_ranking == 3 ? 'highlight-badge' : '' ?>">
                                    <img src={{URL::to('/img/gold-medal2.png')}} alt=""/>
                                    <span>
                                        <?php echo $user_ranking == 3 ? '01' : '00' ?>
                                    </span>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <div class="right_sec_second">

                        <div class="col-md-12">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-12">
                                @if(empty($user_teams))
                                    <div class="alert">
                                        <p style="color: #F88509;">
                                            You don't have any team yet.
                                            <a class="btn btn-gamithon-default btn-success pull-right"
                                               href="{{route('usertournamenthome')}}">
                                                Press here to make your team to win prizes
                                            </a>
                                        </p>
                                    </div>
                                @else
                                    <span class="trophies text-center">Your Teams</span>
                                    {!! Form::open(['url' => route('teamdetail'),'method'=>'get']) !!}
                                    <div class="form-group">
                                        <select required id="team_id" style="width:100%;" name="team_id"
                                                class="form-control dropdown-toggle col-md-12"
                                                data-toggle="dropdown"
                                                style="border:1px solid #9acc59; border-radius: 6px;">
                                            <option value="">Please select your team</option>
                                            @foreach($user_teams as $row)
                                                <option id="dropdownbtn"
                                                        value="{{$row['id']}}">{{$row['name']}}
                                                    ( {{$row['teamtournament']['name']}} )
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="clear clearfix" style="margin-top:10px;"></div>
                                    <div style="margin-top:10px;" class="form-group text-center">
                                        <button class="btn btn-block btn-gamithon-default btn-success"
                                                type="submit">
                                            Go
                                        </button>
                                    </div>

                                    </form>
                                @endif
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                    </div>

                    {{--<div class="upcoming_sec">--}}
                    {{--<span class="text_abot_me_upcome">Active Tournaments</span>--}}
                    {{--<div class="col-md-12 no-padding">--}}
                    {{--<ul class="upcomin_list">--}}

                    {{--@foreach($upcommingTour as $tour)--}}
                    {{--<li>--}}
                    {{--<div class="left_upcoming">--}}
                    {{--<span><img src="{{URL::to('/img/upcomin_img.png')}}" alt=""/></span>--}}
                    {{--<div class="sect">--}}
                    {{--<span class="text_abot_me_upcome_tour">{{$tour['name']}}</span>--}}
                    {{--<span class="clor_text">--}}

                    {{--</span>--}}
                    {{--<span class="time_area">{{formatDate($tour['start_date'])}}</span>--}}
                    {{--<a href="{{route('fixturesdetail',['tournament_id'=>$tour['slug']])}}"--}}
                    {{--class="more_btn">--}}
                    {{--More Info >--}}
                    {{--</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="right_upcoming">--}}
                    {{--<span class="nine_area">--}}
                    {{--01--}}
                    {{--<span> June</span>--}}
                    {{--</span>--}}
                    {{--</div>--}}
                    {{--</li>--}}
                    {{--@endforeach--}}
                    {{--</ul>--}}
                    {{--</div>--}}

                    {{--</div>--}}

                </div>
            </div>
        </div>
    </div>
    <div class="clearfix clear" style="margin-bottom: 100px;"></div>

@endsection
@section('FbJsSdk')
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                appId: '337419313358697',
                autoLogAppEvents: true,
                xfbml: true,
                version: 'v2.9'
            });
            FB.AppEvents.logPageView();
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@endsection
@section('facbook-og-tags')
    <meta property="og:url" content="heelo world"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="My title"/>
    <meta property="og:description" content="Join referral here"/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="600"/>
    <meta property="og:image" content="http://www.gamithonfantasy.com/assets-new/img/gamithon-logo1.png"/>
    <meta property="fb:app_id" content="337419313358697"/>
@stop


@section('js')
    {!! Html::script('js/clipboard.min.js') !!}
    <script>
        var clipboard = new Clipboard('.js-textareacopybtn');
        clipboard.on('success', function (e) {
            alert('Copied to clipboard!');
            e.clearSelection();
        });
        clipboard.on('error', function (e) {
            alert('Oops, An error occurred!');
        });
        document.getElementById('shareBtn').onclick = function () {
            FB.ui({
                method: 'share',
                display: 'popup',
                href: '{{URL::to('/')}}' + '/signup/?referral_key={{$userprofileinfo['referral_key']}}',
            }, function (response) {
            });
        }
    </script>
    {{--<script>--}}
    {{--document.getElementById('shareBtn').onclick = function () {--}}
    {{--FB.ui({--}}
    {{--method: 'share',--}}
    {{--display: 'popup',--}}
    {{--href: 'http://www.gamithonfantasy.com/signup/?referral_key={{$userprofileinfo['referral_key']}}',--}}
    {{--}, function (response) {--}}
    {{--});--}}
    {{--}--}}
    {{--</script>--}}
@endsection