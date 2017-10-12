@extends('layouts.app')

@section('title')
    Gamithon Fantasy
@stop
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
                    <div class="abot_me_sec">
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
                        <a href="{{route('userProfileEdit')}}" class="btn_club">Edit</a>
                    </div>
                    <div class="abot_me_sec">
                    <span class="text_abot_me">
                         Tournament Scores
                    </span>

                        <ul class="aboutsec">
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
                                 Share and win 500 points
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
                                    <button class="btn btn-secondary js-textareacopybtn"
                                            data-clipboard-target="#ref_link"
                                            type="button">Copy referral code
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    @if(!empty($challenges[0]['challenges']))
                        <div class="abot_me_sec" style="display:none;">
                            <span class="text_abot_me">
                                Inactive Challenges
                            </span>
                            @include('adminlte::layouts.form_errors')
                            @foreach($challenges as $val)
                                @foreach($val['challenges'] as $row)
                                    <ul class="aboutsec">
                                        <li>
                                            Name <span id="game_lame">{{$row['user']['name']}}</span>
                                        </li>
                                        <li>
                                            Reward: <span id="game_lame">{{$row['rewards']}}</span>
                                            <a href="{{route('accept_challenge',['id'=>$row['id'],'match_id'=>$row['match_id']])}}">Accept</a>
                                            <a href="{{route('accept_challenge',['id'=>$row['id'],'match_id'=>$row['match_id']])}}">Reject</a>
                                        </li>


                                    </ul>
                                @endforeach
                            @endforeach

                        </div>
                    @endif
                    @if(!empty($accepted_challenges[0]['challenges']))
                        <div class="abot_me_sec" style="display:none;">
                            <span class="text_abot_me">
                                Active Chanllenges
                            </span>
                            @include('adminlte::layouts.form_errors')
                            @foreach($accepted_challenges as $val)
                                @foreach($val['challenges'] as $row)
                                    <ul class="aboutsec">
                                        <li>

                                            Vs <span id="game_lame">{{$row['user']['name']}}</span>
                                        </li>
                                        <li>
                                            Reward: <span id="game_lame">{{$row['rewards']}}</span>
                                            <span id="game_lame">

                                                <a class="btn btn-success" href="{{route('listChalllenges')}}">See
                                                    All </a>

                                        </span>
                                        </li>
                                    </ul>
                                @endforeach
                            @endforeach

                        </div>
                    @endif
                    @if(!empty($sent_challenges))
                        <div class="abot_me_sec" style="display:none;">
                    <span class="text_abot_me">
                        Sent Chanllenges
                    </span>
                            @include('adminlte::layouts.form_errors')

                            @foreach($sent_challenges as $row)

                                <ul class="img_area_area">
                                    <li>

                                        Vs <span id="game_lame">{{$row['user_by']['name']}}</span>
                                    </li>
                                    <li>
                                        Reward: <span id="game_lame">{{$row['rewards']}}</span>
                                        <span id="game_lame">

                                                <a class="btn btn-success" href="{{route('listChalllenges')}}">See
                                                    All </a>
                                        </span>
                                    </li>


                                </ul>

                            @endforeach

                        </div>
                    @endif
                    <div class="abot_me_sec" style="display:none;">

                        <p class="text-center">

                        <div id="shareBtns" class="btn btn-success clearfix center">Invite Friends</div>
                        </p>
                        <p>
                            Current Membership:
                            @if(empty($user_memberhsip['membership']))
                                Not a member

                            @else

                                @foreach($user_memberhsip['membership'] as $row)
                                    {{$row['name']}}
                                @endforeach
                            @endif

                        </p>

                        <p class="text-center">
                            <a class="btn btn-success" href="{{route('membershiphome')}}">Change Membership Plan</a>

                        </p>

                        <p class="text-center">
                            <a class="btn btn-success" href="{{route('paymentdetails')}}">Payment History</a>

                        </p>

                        <p class="text-center">
                            <a class="btn btn-success" href="{{route('challenges')}}">Challenge</a>

                        </p>

                        <p class="text-center">
                            <a class="btn btn-success" href="{{route('listChalllenges')}}">See All Challenges</a>

                        </p>


                    </div>
                </div>
                <div class="col-md-8 no-padding">
                    <div class="col-md-6">
                        <div class="right_sec">
                            <div class="col-md-12">
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
                            <div class="col-md-12">
                                <ul class="medal" style="padding: 20px 0 0;">
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
                    </div>
                    <div class="col-md-6">
                        <div class="right_sec" style="padding: 15px 20px 20px; text-align: center; box-shadow: none !important;">
                            @include('layouts.invite_sec')
                        </div>
                    </div>

                    <div class="col-md-12">
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
    <script>
        document.getElementById('shareBtn').onclick = function () {
            FB.ui({
                method: 'share',
                display: 'popup',
                href: '{{URL::to('/')}}' + '/signup/?referral_key={{\Auth::user()->referral_key}}',
            }, function (response) {
            });
        }
    </script>

@endsection





@section('FbJsSdk')
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                appId: '{{config('const.fbappid')}}',
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
    <meta property="og:url" content="{{URL::to('/')}}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="Gamithon Fantasy"/>
    <meta property="og:description" content="Join referral here"/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="600"/>
    <meta property="og:image" content="{{URL::to('assets-new/img/default-profile-pic-1.png')}}"/>
    <meta property="fb:app_id" content="{{config('const.fbappid')}}"/>
@stop