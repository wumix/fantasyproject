@extends('layouts.app')
{{--{{dd($matches->t)}}--}}
@section('title')
    <title>My Account</title>
@stop
@section('content')
    <div class="section_area">
        <div class="text_con">
            <span class="owner_text">{{$userprofileinfo['name']}}</span>
        </div>
        <div class="container">
            <div class="row">

        <span class="circle_area_for">
            <img src="{{route('userProfileEdit')}}" alt=""/>
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
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore ma

                            gna aliqua. Ut enim ad minim veniam, quis
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
                        <a href="{{route('userProfileEdit')}}" class="btn_club">View more</a>
                    </div>
                    <div class="abot_me_sec">
                    <span class="text_abot_me">
                        Privious Tournament Score
                    </span>

                        <ul class="img_area_area">
                            <li>

                                IPL Score <span id="game_lame"> 2000</span>
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
                            <span class="number_sec">30</span>
                        </div>
                        <div class="col-md-6">
                            <ul class="medal">
                                <li>
                                    <img src={{URL::to('/img/gold-medal.png')}} alt=""/>
                                    <span>20</span>
                                </li>
                                <li>
                                    <img src={{URL::to('/img/gold-medal1.png')}} alt=""/>
                                    <span>10</span>
                                </li>
                                <li>
                                    <img src={{URL::to('/img/gold-medal2.png')}} alt=""/>
                                    <span>00</span>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <div class="right_sec_second">

                        <div class="col-md-12">

                            <span class="trophies">Your's Team</span>
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

                            </form>                        </div>
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
                                            <span><img src="{{URL::to('/img/upcomin_img.png')}}" alt=""/></span>
                                            <div class="sect">
                                                <span class="text_abot_me_upcome_tour">{{$tour['name']}}</span>
                                                <span class="clor_text">{{  formatDate($tour['start_date'])}}</span>
                                                <span class="time_area">{{formatDate($tour['start_date'])}}</span>
                                                <a href="#" class="more_btn">More Info ></a>
                                            </div>
                                        </div>
                                        <div class="right_upcoming">
                             <span class="nine_area">
                            09
                            <span>APR</span>
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
            });


        });

    </script>
@endsection