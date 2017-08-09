@extends('layouts.app')
{{--{{dd($matches->t)}}--}}
@section('css')
    {!! Html::style('assets-new/css/slick-theme.css') !!}
    {!! Html::style('assets-new/css/slick.css') !!}
    <style>
        .rfral_code {
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow: 0px 0px 27px rgba(0, 0, 0, 0.21);
            padding: 20px 20px;
            margin-bottom: 40px;
        }
        .new_form{
            width: 195px !important;
            padding: 20px;
            border: 1px solid #92B713;
        }
        .js-textareacopybtn{
            padding: 11px;
            width: 76px;
            background: #92B713;
            color: #fff;
        }
    </style>
@endsection


@section('title')
    Gamithon Fantasy - Play Fantasy League Create Team
@stop
@section('content')
    <!--BASBB-->

    <header id="header">
        <div id="abcd" class="header-content container">
            <div class="container">
                <div class="col-md-12 no-padding">

                    <div class="col-md-8"></div>
                    <div class="carousal-leaders-tourm  col-md-4">
                        <?php $i = 1;?>
                        @foreach($tournaments_list as $tournament)
                            <div class="header-content-inner bg-primary-opacity col-md-4 ">

                                <div class="row">
                                    <div class="col-md-12 no-padding">
                                        <h3 style="font-weight: 500; color: #FFFFFF">
                                            @if(!empty($tournament['nextmatch']))
                                                NEXT MATCH COUNT DOWN
                                            @else
                                                {{ $tournament['name']}}
                                            @endif
                                        </h3>
                                        <h6 style="color: white;">
                                            {{$tournament['nextmatch']['team_one']}}
                                            @if(!empty($tournament['nextmatch']))
                                                <strong class="mlr10 Bold">
                                                    <em>Vs</em>
                                                </strong>
                                            @endif
                                            {{$tournament['nextmatch']['team_two']}}
                                        </h6>
                                    </div>
                                </div>

                                @if(!empty($tournament['nextmatch']))
                                    <div class="row col-md-12">
                                        <div class="col-md-12 count-down no-padding mt30">
                                            <div class="col-md-3 text-center">
                        <span id="getting-started{{$i}}" class="circle">
                            10
                        </span>
                                                <p class="mtb10">Days</p>
                                            </div>
                                            <div class="col-md-3 text-center">
                        <span id="getting-started{{$i+1}}" class="circle">
                            10
                        </span>
                                                <p class="mtb10">Hours</p>
                                            </div>
                                            <div class="col-md-3 text-center">
                        <span id="getting-started{{$i+2}}" class="circle">
                            10
                        </span>
                                                <p class="mtb10" style="margin-left: 12px;">Min</p>
                                            </div>
                                            <div class="col-md-3 text-center">
                        <span id="getting-started{{$i+3}}" class="circle">
                            10
                        </span>
                                                <p class="mtb10" style="margin-left: 12px;">Sec</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                <div class="row">
                                    <!-- style="margin-top: -20px;"-->
                                    <div class="col-md-12 no-padding">

                                        <h4 style="font-weight: 500;color: #FFFFFF">
                                            @if(!empty($tournament['leaderboard']))
                                                Leader Board
                                            @endif
                                        </h4>

                                    </div>
                                </div>


                                <div>
                                    <div class="col-md-12 count-down no-padding">
                                        @if(!empty($tournament['leaderboard']))
                                            @foreach($tournament['leaderboard'] as $leader)
                                                <div class="col-md-4  text-center">
                                                    <div class="circle2 leadersName" style="padding-top: 5px;">
                        <span id="getting-started1">
                          <img style="width: 50px;
    height: 50px; border-radius: 50%;
    margin:0 auto;


" src="{{getUploadsPath($leader['user']['profile_pic'])}}"/>
                        </span>
                                                        <p class="no-mrg-in-home ">{{$leader['user']['name']}}</p>
                                                        <p class="no-mrg-in-home1 leaderboardscore">{{$leader['score']}}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>


                                @if(!empty($tournament['leaderboard']))
                                    <div class="row">
                                        <div class="col-md-12 no-padding">

                                            <h5>


                                                <a class="btn leaderboardviewmorebutton"
                                                   href="{{route('homeleaderboard',['id'=>$leader['tournament_id']])}}">View
                                                    More</a>

                                            </h5>

                                        </div>
                                    </div>
                                @endif
                                <div class="clear clearfix"></div>

                            </div>


                            <?php $i = $i + 4?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--BASBB-->
    <!-- ..........................Banner Start ............................-->
    <!-----------    ----------->


    @if(!empty($tournaments_list))
        <section class="bg-primary" id="about">
            <div class="container">
                <div class="row">

                    <div class="col-lg-9 text-center">
                        <h2 class="section-heading">
                            Active Tournament and Series
                            <hr class="light">
                        </h2>

                        <div class="table-responsive">
                            <table class="table table-striped table-stripedhome gen-table">
                                <thead class="main-taible-head">
                                <tr>
                                    <th class="border-r th1">Name</th>
                                    <th class="border-r">Venue</th>
                                    <th class="border-r">Started At</th>
                                    <th class="th2">Ending At</th>
                                </tr>
                                </thead>
                                <tbody class="main-taible-body">
                                @if(!empty($tournaments_list))
                                    @foreach ($tournaments_list as $row)
                                        <tr class="trr">
                                            <td class="border-r"><a
                                                        href="{{route('fixturesdetail',['tournament_id'=>$row['slug']])}}">{{$row['name']}}</a>
                                            </td>
                                            <td class="border-r">{{$row['venue']}}</td>
                                            <td class="border-r">


                                                <?php
                                                echo formatDate($row['start_date']);
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo formatDate($row['end_date']);
                                                ?>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="trr">
                                        <td class="border-r" colspan="4">NO LISTING YET</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <a href="{{route('usertournamenthome')}}" class="btn btn-green ">
                            View all
                        </a>
                    </div>
                    <div class="col-lg-3 text-center">

                        @if(\Auth::check())
                            <img style="margin-top: 15px;" src="{{URL::to('/')}}/img/refer-img.png"/>
                        @else
                            <h2 class="section-heading" style="margin-top: 30px;
    font-size: 21px;" >
                                Share and get 5000 points
                                <hr class="light">
                            </h2>
                            <div class="input-group">

                                <input type="text" value="{{ URL::to('/')}}/signup/?referral_key={{\Crypt::encrypt(\Auth::user()->referral_key)}}" class="js-copytextarea form-control new_form">
                                <span class="input-group-btn">
        <button class="btn btn-secondary js-textareacopybtn" type="button">Copy</button>
      </span>
                            </div>
                            <div class="row">
                                <img src="{{URL::to('/')}}/img/facebook-share.png" id="shareBtn" style="cursor:pointer; margin-top: 1%" />

                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </section>
    @endif
    @if(!empty($upcomming_tournaments_list))

        {{--<section class="bg-primary" id="about">--}}
        {{--<div class="container">--}}
        {{--<div class="row">--}}

        {{--<div class="col-lg-12 text-center">--}}
        {{--<h2 class="section-heading">--}}
        {{--Upcomming Tournaments--}}
        {{--<hr class="light">--}}
        {{--</h2>--}}

        {{--<div class="table-responsive">--}}
        {{--<table class="table table-striped table-stripedhome gen-table">--}}
        {{--<thead class="main-taible-head">--}}
        {{--<tr>--}}
        {{--<th class="border-r th1">Name</th>--}}
        {{--<th class="border-r">Venue</th>--}}
        {{--<th class="border-r">Started At</th>--}}
        {{--<th class="th2">Ending At</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody class="main-taible-body">--}}
        {{--@foreach($upcomming_tournaments_list as $tournament)--}}
        {{--<tr class="trr">--}}
        {{--<td class="border-r">--}}
        {{--<a href="{{route('fixturesdetail',['tournament_id'=>$tournament['slug']])}}">{{$tournament['name']}} </a>--}}
        {{--</td>--}}
        {{--<td class="border-r">{{$tournament['venue']}}</td>--}}
        {{--<td class="border-r">--}}
        {{--{{formatDate($tournament['start_date'])}}--}}
        {{--</td>--}}
        {{--<td>--}}
        {{--{{formatDate($tournament['end_date'])}}--}}
        {{--</td>--}}
        {{--</tr>--}}

        {{--@endforeach--}}

        {{--</tbody>--}}
        {{--</table>--}}
        {{--</div>--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</section>--}}
    @endif

    @if(!empty($news))
        <section class="bg-primary" style="padding-bottom: 20px;">
            <div class="container">
                <div class="">
                    <!-- start news -->

                    @foreach($news as $key=>$val)

                        <div class="col-md-4 itemsz " style="margin: 15px 0 15px 0;  padding: 15px;">
                            <div class="media newscolor">
                                <div class="media-left">
                                    <a href="{{getUploadsPath($val['image'])}}">
                                        <?php
                                        $arr = explode('/', $val['image']);

                                        ?>
                                        <img class="media-object"
                                             src="{{Croppa::url($val['image'],177,105)}}" alt="{{end($arr)}}">
                                    </a>


                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading mediah">
                                        <a class="home-news-headings"
                                           href="{{route('newsdetail',['id'=>$val['slug']])}}">
                                            {{$val['title']}}
                                        </a>
                                    </h4>

                                    <span style="font-size: 12px;">
                       {!! str_limit($val['description'], 100) !!}...
                            <br>
                        <a href="{{route('newsdetail',['id'=>$val['slug']])}}">Read More</a>
    </span>
                                </div>
                            </div>
                        </div>
                @endforeach
                <!-- end news -->
                </div>
            </div>
        </section>
    @endif


    <!-- LETS PLAY AT GAMITHON  Start-->
    <section id="services" class=" services-padding-bottom bg-dark how-to-play-summery">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">How to play Gamithon Fantasy</h2>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">


                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        <a>
                            <i class="fa fa-4x fa-user-plus sr-icons"></i>
                            <p class="text-muted">
                                SIGN UP TO PLAY AT GAMITHON
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        <a disabled='disabled'>
                            <i class="fa fa-4x fa-users sr-icons"></i>
                            <p class="text-muted">
                                CREATE YOUR TEAM
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">

                    <div class="service-box">
                        <a disabled="true">
                            <i class="fa fa-4x fa-trophy sr-icons"></i>
                            <p class="text-muted">
                                SELECT PLAYERS AND WIN PRIZES!
                            </p>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section id="services" class=" services-padding-bottom bg-dark how-to-play-summery"
             style="background:#252525 !important">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Download Our Mobile Applications</h2>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <div class="col-lg-2 col-md-2 text-center">
                </div>

                <div class="col-lg-4 col-md-4 text-center">
                    <div class="service-box">
                        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.branches.gamithon">
                            <img src="{{URL::to('/img/google.png')}}"/>

                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center">

                    <div class="service-box">
                        <a disabled="true">
                            <img src="{{URL::to('/img/ios.png')}}"/>

                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 text-center">
                </div>
            </div>
        </div>
    </section>
    {{--.............................Gallry Start..............................................--}}
    <section id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter popup-gallery">
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/301.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/301.jpg" class="img-responsive" alt="KXIP VS MI">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Trinbago Knight Riders v St Lucia Stars
                                </div>
                                <div class="project-name">
                                    T&T Riders won by 4 wickets
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/302.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/302.jpg" class="img-responsive" alt="KXIP VS KKR">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Trinbago Knight Riders v St Lucia Stars
                                </div>
                                <div class="project-name">
                                    T&T Riders won by 4 wickets
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/303.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/303.jpg" class="img-responsive" alt="KXIP VS KKR">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Trinbago Knight Riders v St Lucia Stars
                                </div>
                                <div class="project-name">
                                    T&T Riders won by 4 wickets
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/101.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/101.jpg" class="img-responsive" alt="KXIP VS MI">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Patriots Vs Amazaon
                                </div>
                                <div class="project-name">
                                    Patriots won by 4 runs
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/102.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/102.jpg" class="img-responsive" alt=" DD VS GL">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Patriots Vs Amazaon
                                </div>
                                <div class="project-name">
                                    Patriots won by 4 runs
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/103.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/103.jpg" class="img-responsive" alt="KXIP VS MI">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Tallawahs Vs Tridents

                                </div>
                                <div class="project-name">
                                    Tallawahs won by 12 runs
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/201.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/201.jpg" class="img-responsive" alt=" DD VS GL">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Nevis Patriots VS St Kitts
                                </div>
                                <div class="project-name">
                                    Nevis Patriots won by 4 wickets
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <a href="../img/portfolio/thumbnails/202.jpg" class="portfolio-box">
                        <img src="../img/portfolio/thumbnails/202.jpg" class="img-responsive" alt="KXIP VS KKR">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Nevis Patriots VS St Kitts
                                </div>
                                <div class="project-name">
                                    Nevis Patriots won by 4 wickets
                                </div>
                            </div>


                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/203.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/203.jpg" class="img-responsive" alt=" DD VS GL">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Nevis Patriots VS St Kitts
                                </div>
                                <div class="project-name">
                                    Nevis Patriots won by 4 wickets
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


            </div>
        </div>
    </section>
    <!-- /.....................footer Start here......................../ -->
@endsection
@section('js')
    {!! Html::script('assets-new/js/slick.js') !!}
    {!! Html::script('assets/jquery.countdown-2.2.0/jquery.countdown.min.js') !!}
    @php($date= '00-00-00 00:00:00')
    <?php $i = 1?>
    @foreach($tournaments_list as $tournament)
        @if(!empty($tournament['nextmatch']))
            @if(!empty($tournament['nextmatch']['start_date']))
                @php($date=$tournament['nextmatch']['start_date'])
                {{Html::script('js/moment.js')}}
                <script type="text/javascript">
                    var dateObj = new Date();
                    var userTimeZone = dateObj.getTimezoneOffset();
                    //Time zone is in negatinv i.e. forward from GMT
                    userTimeZone = (userTimeZone < 0) ? Math.abs(userTimeZone) : Math.abs(userTimeZone) * -1;

                    var tournamentDateTime = moment('{{$date}}').add('m', userTimeZone).format('YYYY/MM/DD hh:mm:ss a');
                    console.log(tournamentDateTime, userTimeZone);

                    $('#getting-started{{$i}}').countdown(tournamentDateTime, function (event) {
                        $(this).text(
                            event.strftime('%D')
                        );
                    });
                    $("#getting-started{{$i+1}}")
                        .countdown(tournamentDateTime, function (event) {
                            $(this).text(
                                event.strftime('%H')
                            );
                        });
                    $("#getting-started{{$i+2}}")
                        .countdown(tournamentDateTime, function (event) {
                            $(this).text(
                                event.strftime('%M')
                            );
                        });
                    $("#getting-started{{$i+3}}")
                        .countdown(tournamentDateTime, function (event) {
                            $(this).text(
                                event.strftime('%S')
                            );
                        });
                </script>
                <?php $i = $i + 4?>
            @endif
        @endif
    @endforeach


    <script>
        $('#header').backstretch([


            {url: '{{URL::to('assets-new/img/gamithon-Cpl-1.jpg')}}', fade: 500},
            {url: '{{URL::to('assets-new/img/web-prize-final.jpg')}}', fade: 500},
            {url: '{{URL::to('assets-new/img/southwin.jpg')}}', fade: 500},


        ]);


    </script>
    <script>
        $(function () {
            $('.itemsz, .leadersName').matchHeight('col-md-4');
        });

    </script>

    <script>
        $(document).ready(function () {
            $('.carousal-leaders-tourm').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 7000,
                adaptiveHeight: true, lazyLoad: 'ondemand',
                fade: true,
                prevArrow: '<a href="" style=" font-size:43px; text-decoration:none;border: none;cursor: hand; outline: none;left:-25px;position: absolute; top:50%;" class="fa fa-chevron-circle-left"></a>',
                nextArrow: '<a href="" style=" font-size:43px; text-decoration:none;border: none;cursor: hand; outline: none;right:-25px;position: absolute; top:50%;" class="fa fa-chevron-circle-right"></a>'

                //prevArrow:'<button type="button" class="slick-prev" style="fa fa-chevron-circle-right" aria-hidden="true"></i>Previous</button>'

            });
        });
    </script>
    <script>
        var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

        copyTextareaBtn.addEventListener('click', function(event) {
            var copyTextarea = document.querySelector('.js-copytextarea');
            copyTextarea.select();

            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';
                //  alert('copied to clipboard');
            } catch (err) {
                // console.log('Oops, unable to copy');
            }
        });


    </script>
    <script>
        document.getElementById('shareBtn').onclick = function () {
            FB.ui({
                method: 'share',
                display: 'popup',
                href: '{{URL::to('/')}}' + '/signup/?referral_key={{\Crypt::encrypt(\Auth::user()->referral_key)}}',
            }, function (response) {
            });
        }
    </script>
    <script>
        document.getElementById('shareBtn').onclick = function () {
            FB.ui({
                method: 'share',
                display: 'popup',
                href: 'http://www.gamithonfantasy.com/signup/?referral_key={{\Crypt::encrypt(\Auth::user()->referral_key)}}',
            }, function (response) {
            });
        }
    </script>


@stop
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