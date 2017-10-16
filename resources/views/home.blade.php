@extends('layouts.app')

@section('meta-keywords')
    <meta name="keywords" content="fantasy Cricket
Play Fantasy Cricket,
IPL Fantasy League,
PSL Fantasy League,
CPL Fantasy League,
Fantasy Cricket League,
Cricket League,
Cricket Fantasy League,
Cricket Fantasy,
Play Fantasy Cricket and Win Cash Daily,
Cricket app">
    <meta name="description"
          content="Gamithon Fantasy cricket is a strategy game, Based on their cricketer's real-life performance, users get points and compete with others to win prizes…">
@endsection
@section('css')
    {!! Html::style('assets-new/css/slick-theme.css') !!}
    {!! Html::style('assets-new/css/slick.css') !!}

@endsection


@section('title')
    Gamithon Fantasy - Play Fantasy League Create Team
@stop
@section('live_scores')
    <!-- Header fixtures Start -->
    <div id="header_fixtures_wrapper">
        <div class="container">
            <div class="row">

                <!-- Fixture Start -->
                @foreach($match_scores as $match_score)
                    <a class="colorbox"
                       href="{{route('scorecardpopup',['slug'=>$match_score['id'],'tournament_id'=>$match_score['tournament_id']])}}"
                       class="view_scorecard_btn">
                        <div class="col-md-3 fixture_wrapper">
                            <div class="teams_scores_wrapper">

                                <div class="team_score_1 team_score">
                                    {{$match_score['team_one']}}

                                </div>
                                <span>VS</span>

                                <div class="team_score_2 team_score">
                                    {{$match_score['team_two']}}

                                </div>
                                @if(empty($match_score['match_scores'][0]['score']))
                                    <span class="match_summary">{{$match_score['match_scores'][0]['score']}}</span>
                                @else
                                    <span class="match_summary">{{$match_score['match_scores'][0]['description']}}</span>
                                @endif
                            </div>
                        </div>
                    </a>
            @endforeach
            <!-- Fixture End -->


            </div>
        </div>
    </div>
    <!-- Header fixtures End -->
@endsection
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
        <div id="home_banner_nav">
            <span class="banner_navigation prev_slide"><i class="fa fa-chevron-circle-left"></i></span>
            <span class="banner_navigation next_slide"><i class="fa fa-chevron-circle-right"></i></span>
        </div>
    </header>
    <!--BASBB-->
    <!-- ..........................Banner Start ............................-->


    @if(!empty($tournaments_list))
        <section class="bg-primary" id="about">
            <div class="container">
                <div class="row">
                    {{--<div class="col-lg-2">--}}
                    {{--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>--}}
                    {{--<!-- home_page -->--}}
                    {{--<ins class="adsbygoogle"--}}
                    {{--style="display:inline-block;width:120px;height:240px"--}}
                    {{--data-ad-client="ca-pub-8140847957930358"--}}
                    {{--data-ad-slot="6115581633"></ins>--}}
                    {{--<script>--}}
                    {{--(adsbygoogle = window.adsbygoogle || []).push({});--}}
                    {{--</script>--}}

                    {{--</div>--}}
                    <div class="col-lg-9 text-center">
                        <h1 class="section-heading">
                            Active Tournament and Series
                            <hr class="light">
                        </h1>

                        <div class="table-responsive active_tournament_wrapper">
                            <table class="table table-striped table-stripedhome gen-table">
                                <thead class="main-taible-head">
                                <tr>
                                    <th class="border-r th1">Name</th>
                                    <th class="border-r">Venue</th>
                                    <th class="border-r">Starts</th>
                                    <th class="th2 border-r">Ends</th>
                                    <th class="th2"></th>
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
                                            <td class="border-r">
                                                <?php
                                                echo formatDate($row['end_date']);
                                                ?>
                                            </td>
                                            <td><a href="{{route('fixturesdetail',['tournament_id'=>$row['slug']])}}" class="active_tournaments_btn">View Scorecard</a></td>
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
                    <div class="col-lg-3 refer_friend_wrapper @if(!\Auth::check()) refer_friend_wrapper @endif">
                        @include('layouts.invite_sec')
                    </div>
                </div>
            </div>
            <div class="clear clearfix"></div>
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
        <section class="bg-primary" style="padding-top: 20px; padding-bottom: 20px;">
            <div class="container">
                <div class="blog_carousel owl-carousel owl-theme">
                    <!-- start news -->

                    @foreach($news as $key=>$val)

                        <div class="itemsz item" style="padding: 0; background: #fff;">
                            <div class="media newscolor">
                                <div class="gami_blog_thumb col-md-5" style="padding: 0;">
                                    <a href="{{route('newsdetail',['id'=>$val['slug']])}}">
                                        <?php $arr = explode('/', $val['image']); ?>

                                        @if(check_image($arr))
                                            <img class="media-object"
                                                 src="/uploads/source/thumb{{end($arr)}}" alt="{{end($arr)}}">
                                        @else
                                            <img class="media-object"
                                                 src="/uploads/source/default-img.jpg" alt="{{end($arr)}}" height="160">

                                        @endif

                                    </a>


                                </div>
                                <div class="gami_blog_desc col-md-7">
                                    <h4 class="media-heading mediah">
                                        <a class="home-news-headings"
                                           href="{{route('newsdetail',['id'=>$val['slug']])}}">
                                            {!! substr($val['title'],0, 30) !!}
                                        </a>
                                    </h4>

                                    <span style="font-size: 13px;min-height:55px;display:block;margin-bottom: 10px;">
                                        {!! substr($val['description'],0, 71) !!}...
                                        <br>
                                    </span>
                                    <a href="{{route('newsdetail',['id'=>$val['slug']])}}" class="gami_news_btn">Read
                                        More</a>
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
    <section id="how_to_play" class=" services-padding-bottom bg-dark how-to-play-summery">
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
                        <i class="fa fa-4x fa-user-plus sr-icons"></i>

                        <p class="text-muted">
                            SIGN UP TO PLAY AT GAMITHON
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-users sr-icons"></i>

                        <p class="text-muted">
                            CREATE YOUR TEAM
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">

                    <div class="service-box">
                        <i class="fa fa-4x fa-trophy sr-icons"></i>

                        <p class="text-muted">
                            SELECT PLAYERS AND WIN PRIZES!
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section id="mobile_applications" class=" services-padding-bottom bg-dark how-to-play-summery"
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
                        <a target="_blank"
                           href="https://play.google.com/store/apps/details?id=com.branches.gamithon">
                            <img src="{{URL::to('/img/google.png')}}"/>

                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center">

                    <div class="service-box">
                        <a target="_blank"
                           href="https://itunes.apple.com/us/app/gamithon-fantasy/id1277096945?ls=1&mt=8">
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

                    <a href="img/portfolio/thumbnails/901.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/901.jpg" class="img-responsive" alt="KXIP VS MI">

                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    India Vs Australia
                                </div>
                                <div class="project-name">
                                    Australia won by 8 wickets
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6">

                    <a href="img/portfolio/thumbnails/902.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/902.jpg" class="img-responsive" alt="KXIP VS KKR">

                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    India Vs Australia
                                </div>
                                <div class="project-name">
                                    Australia won by 8 wickets
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-lg-4  col-sm-6">
                    <a href="img/portfolio/thumbnails/903.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/903.jpg" class="img-responsive" alt="KXIP VS KKR">

                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    India Vs Australia
                                </div>
                                <div class="project-name">
                                    Australia won by 8 wickets
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">

                    <a href="img/portfolio/thumbnails/701.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/701.jpg" class="img-responsive" alt=" DD VS GL">

                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    India Vs Australia
                                </div>
                                <div class="project-name">
                                    India won by 7 wickets
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">

                    <a href="img/portfolio/thumbnails/702.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/702.jpg" class="img-responsive" alt="KXIP VS MI">

                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        India Vs Australia
                                    </div>
                                    <div class="project-name">
                                        India won by 7 wickets
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/703.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/703.jpg" class="img-responsive" alt=" DD VS GL">

                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        India Vs Australia
                                    </div>
                                    <div class="project-name">
                                        India won by 7 wickets
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">

                    <a href="img/portfolio/thumbnails/801.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/801.jpg" class="img-responsive" alt=" DD VS GL">

                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    India Vs Australia
                                </div>
                                <div class="project-name">
                                    Australia won by 21 runs
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-lg-4 col-sm-6">

                    <a href="img/portfolio/thumbnails/802.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/802.jpg" class="img-responsive" alt="KXIP VS MI">

                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    India Vs Australia
                                </div>
                                <div class="project-name">
                                    Australia won by 21 runs
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">

                    <a href="../img/portfolio/thumbnails/803.jpg" class="portfolio-box">
                        <img src="../img/portfolio/thumbnails/803.jpg" class="img-responsive" alt="KXIP VS KKR">

                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    India Vs Australia
                                </div>
                                <div class="project-name">
                                    Australia won by 21 runs
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
    {!! Html::script('js/clipboard.min.js') !!}

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


                    // Qwl Carousel JS
                    $('.owl-carousel').owlCarousel({
                        loop: true,
                        margin: 15,
                        nav: true,
                        autoplay: true,
                        autoplayTimeout: 3000,
                        autoplayHoverPause: false,
                        navText: ["<i class='fa fa-arrow-left'></i>", "<i class='fa fa-arrow-right'></i>"],
                        responsive: {
                            0: {
                                items: 1
                            },
                            600: {
                                items: 3
                            },
                            1000: {
                                items: 3
                            }
                        }
                    });


                </script>
                <?php $i = $i + 4?>
            @endif
        @endif
    @endforeach

    <script>

        var refer_frnd_height = $('.refer_friend_wrapper').parent().height();
        $('.refer_friend_wrapper').css('height', refer_frnd_height + 'px');

    </script>
    <script>
        $('#header').backstretch([


            {url: '{{URL::to('assets-new/img/23434534.jpg')}}', fade: 500},
            {url: '{{URL::to('assets-new/img/2342342.jpg')}}', fade: 500},
            {url: '{{URL::to('assets-new/img/12238967.jpg')}}', fade: 500},
            {url: '{{URL::to('assets-new/img/india-vs-australia.jpg')}}', fade: 500},


        ]);

        $('#home_banner_nav .prev_slide').click(function () {
            $('#header').backstretch("prev");
        });
        $('#home_banner_nav .next_slide').click(function () {
            $('#header').backstretch("next");
        });


    </script>


    <script>
        $(document).ready(function () {
            $('.itemsz, .leadersName').matchHeight('col-md-4');
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

    @if(\Auth::check())
        <script>
            var clipboard = new Clipboard('.js-textareacopybtn');
            clipboard.on('success', function (e) {
                alert('Copied to clipboard!');
                e.clearSelection();
            });
            clipboard.on('error', function (e) {
                alert('Oops, An error occurred!');
            });
        </script>
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
    @endif

    <script type="application/ld+json"> {
"@context" : "http://schema.org",
"@type" : "Organization",
"name":"Gamithon Fantasy",
"url":"http://www.gamithonfantasy.com/",
"email":"http://www.gamithonfantasyworld.com"
}





    </script>

@stop
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
    <meta property="og:title" content="What is fantasy Cricket?"/>
    <meta property="og:description"
          content="It's a skill-based game that makes you experience the thrill of a coach who would go through before playing every match - a real test of your cricketing skills, your knowledge and understanding of player strengths and weaknesses. You will have to select a team of 11 from a pool of players and compete with other users from all over the world. Winners get exciting cash prizes!"/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="600"/>
    <meta property="og:image" content="{{URL::to('/img/fb-reffer.jpg')}}"/>
    <meta property="fb:app_id" content="{{config('const.fbappid')}}"/>
@stop
