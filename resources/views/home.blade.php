@extends('layouts.app')
{{--{{dd($matches->t)}}--}}
@section('content')
    <!--BASBB-->
    <header id="header">
        <div id="abcd" class="header-content container" style="">
            <div class="container">
                <div class="col-md-12 no-padding">

                    <div class="col-md-8"></div>

                    <div class="header-content-inner bg-primary-opacity col-md-4 ">
                        <div class="row">
                            <div class="col-md-12 no-padding">

                                <h3 style="font-weight: 500; color: #FFFFFF">
                                    NEXT MATCH COUNT DOWN
                                </h3>


                                <h6 style="color: white;">
                                    {{$matches['team_one']}}
                                    <strong class="mlr10 Bold">
                                        <em>Vs</em>
                                    </strong>
                                    {{$matches['team_two']}}
                                </h6>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-12 count-down no-padding mt30">
                                <div class="col-md-3 text-center">
                        <span id="getting-started" class="circle">
                            10
                        </span>
                                    <p class="mtb10">Days</p>
                                </div>
                                <div class="col-md-3 text-center">
                        <span id="getting-started1" class="circle">
                            10
                        </span>
                                    <p class="mtb10">Hours</p>
                                </div>
                                <div class="col-md-3 text-center">
                        <span id="getting-started2" class="circle">
                            10
                        </span>
                                    <p class="mtb10" style="margin-left: 12px;">Min</p>
                                </div>
                                <div class="col-md-3 text-center">
                        <span id="getting-started3" class="circle">
                            10
                        </span>
                                    <p class="mtb10" style="margin-left: 12px;">Sec</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 no-padding" style="margin-top: -20px;">

                                <h3 style="font-weight: 500;color: #FFFFFF">
                                    Leader Board
                                </h3>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 count-down no-padding">

                                @foreach($leaders as $leader)
                                    <div class="col-md-4 text-center">
                                        <div class="circle2">
                        <span id="getting-started1">
                          <img style="width: 50px;
    height: 50px; border-radius: 50%;
    padding:5px;


" src="{{getUploadsPath($leader['user']['profile_pic'])}}"/>
                        </span>
                                            <p class="no-mrg-in-home ">{{$leader['user']['name']}}</p>
                                            <p class="no-mrg-in-home1 leaderboardscore">{{$leader['score']}}</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 no-padding">

                                <h2 style="font-weight: 600;">

                                </h2>

                            </div>
                        </div>
                        <div class="clear clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--BASBB-->
    <!-- ..........................Banner Start ............................-->
    <!-----------    ----------->



    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">
                        Active Tournaments
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
                                                    href="{{route('showTournament', ['tournament_id'=>$row['id']])}}">{{$row['name']}}</a>
                                        </td>
                                        <td class="border-r">{{$row['venue']}}</td>
                                        <td class="border-r">


                                            <?php
                                            $date = new DateTime($row['start_date']);
                                            echo $date->format('d M Y');
                                                ?>
                                        </td>
                                        <td>
                                            <?php
                                            $date = new DateTime($row['end_date']);
                                            echo $date->format('d M Y');
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
                        View all tournaments
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">
                        Upcomming Tournaments
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
                            <tr class="trr">
                                <td class="border-r"> <a href="{{route('championtrophy')}}">Champions Trophy</a>
                                </td>
                                <td class="border-r">England</td>
                                <td class="border-r">1 June 2017</td>
                                <td>18 June 2017</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!---------------------->
    <!-- ...............................News start......................... -->
    {{--<section>--}}
    {{--<div class="container-fluid lnews" >--}}
        {{--<div class="row">--}}
            {{--<div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
                {{--<h3 class="gallery-title">LATEST NEWS</h3>--}}
            {{--</div>--}}


            {{--<br/>--}}
            {{--<div class=" col-md-12">--}}
                {{--<div class=" col-md-12 ">--}}

                    {{--<div class="row">--}}

                        {{--<div class="gallery_product col-md-3 ">--}}
                            {{--<div class="col-md-6 ">--}}
                                {{--<img src="http://fakeimg.pl/365x365/" class="img-responsive imgn">--}}
                            {{--</div>--}}
                            {{--<div class="col-md-6 nt">--}}
                                {{--<span class="nt1">10 March 2017</span>--}}
                                {{--<br>--}}

                                {{--<span class="nt2">Ireland Tri-Nation</span>--}}
                                {{--<br>--}}
                                {{--<span class="nt2">Seriesf</span>--}}
                                {{--<br>--}}
                                {{--<br>--}}
                                {{--<p class="nt3">--}}
                                    {{--New-Zeeland premier fast bowler Wanger said he has worked on depth bowling and also worked on how to stay consistence.--}}
                                {{--</p>--}}



                            {{--</div>--}}

                        {{--</div>--}}

                        {{--<div class="gallery_product col-md-3 ">--}}

                            {{----}}

                        {{--</div>--}}
                        {{--<div class="gallery_product col-md-3 ">--}}
                            {{--<div class="col-md-6 ">--}}
                                {{--<img src="http://fakeimg.pl/365x365/" class="img-responsive imgn">--}}
                            {{--</div>--}}
                            {{--<div class="col-md-6 nt">--}}
                                {{--<span class="nt1">10 March 2017</span>--}}

                                {{--<br>--}}
                                {{--<span class="nt2">lidihflhaijf</span>--}}
                                {{--<br>--}}
                                {{--<span class="nt2">lidihflhaijf</span>--}}
                                {{--<br>--}}
                                {{--<br>--}}
                                {{--<p class="nt3">--}}
                                    {{--ishflkskfjksjkfjs;lfjs.--}}
                                    {{--lkfjlsjflkjsdl;fkd.4--}}

                                    {{--sfklsfjks--}}
                                    {{--sfjsj--}}
                                {{--</p>--}}



                            {{--</div>--}}

                        {{--</div>--}}

                    {{--</div>--}}



                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="..." alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Media heading</h4>
                        New-Zeeland premier fast bowler Wanger said he has worked on depth bowling and also worked on how to stay consistence.
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        </div>
    </div>
</section>

    <!-- LETS PLAY AT GAMITHON  Start-->
    <section id="services" class="bg-dark how-to-play-summery">
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
    {{--.............................Gallry Start..............................................--}}
    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter popup-gallery">


                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/101.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/101.jpg" class="img-responsive" alt=" KXIP vs GL">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    KXIP vs GL
                                </div>
                                <div class="project-name">
                                    Lions won by 6 wickets
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/102.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/102.jpg" class="img-responsive" alt=" KXIP vs GL">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    KXIP vs GL
                                </div>
                                <div class="project-name">
                                    Lions won by 6 wickets
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/103.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/103.jpg" class="img-responsive" alt=" KXIP vs GL">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    KXIP vs GL
                                </div>
                                <div class="project-name">
                                    Lions won by 6 wickets
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <a href="../img/portfolio/thumbnails/201.jpg" class="portfolio-box">
                        <img src="../img/portfolio/thumbnails/201.jpg" class="img-responsive" alt="DD VS MI">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    DD VS MI
                                </div>
                                <div class="project-name">
                                    Indians won by 146 runs
                                </div>
                            </div>


                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/202.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/202.jpg" class="img-responsive" alt="DD VS MI">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    DD VS MI
                                </div>
                                <div class="project-name">
                                    Indians won by 146 runs
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/203.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/203.jpg" class="img-responsive" alt="DD VS MI">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    DD VS MI
                                </div>
                                <div class="project-name">
                                    Indians won by 146 runs
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/301.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/301.jpg" class="img-responsive" alt="DD VS GL">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    DD VS GL
                                </div>
                                <div class="project-name">
                                    Daredevils won by 7 wickets
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/302.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/302.jpg" class="img-responsive" alt="DD VS GL">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    DD VS GL
                                </div>
                                <div class="project-name">
                                    Daredevils won by 7 wickets
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/303.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/303.jpg" class="img-responsive" alt="DD VS GL">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    DD VS GL
                                </div>
                                <div class="project-name">
                                    Daredevils won by 7 wickets
                                </div>
                            </div>
                        </div>
                    </a>
                </div>







            </div>
        </div>
    </section>
    <!-- /.....................footer Start......................../ -->
@endsection
@section('js')
    {!! Html::script('assets/jquery.countdown-2.2.0/jquery.countdown.min.js') !!}
    @php($date= '00-00-00 00:00:00')
    @if(!empty($matches['start_date']))
        @php($date= $matches['start_date'])
    @endif
    {{Html::script('js/moment.js')}}
    <script type="text/javascript">
        var dateObj = new Date();
        var userTimeZone = dateObj.getTimezoneOffset();
        //Time zone is in negatinv i.e. forward from GMT
        userTimeZone = (userTimeZone < 0) ? Math.abs(userTimeZone) : Math.abs(userTimeZone) * -1;

        var tournamentDateTime = moment('{{$date}}').add('m', userTimeZone).format('YYYY/MM/DD hh:mm:ss a');
        console.log(tournamentDateTime, userTimeZone);

        $("#getting-started").countdown(tournamentDateTime, function (event) {
            $(this).text(
                event.strftime('%D')
            );
        });
        $("#getting-started1")
            .countdown(tournamentDateTime, function (event) {
                $(this).text(
                    event.strftime('%H')
                );
            });
        $("#getting-started2")
            .countdown(tournamentDateTime, function (event) {
                $(this).text(
                    event.strftime('%M')
                );
            });
        $("#getting-started3")
            .countdown(tournamentDateTime, function (event) {
                $(this).text(
                    event.strftime('%S')
                );
            });
    </script>
    <script>
        $('#header').backstretch([

            {url: '{{Url::to('assets-new/img/bj2.jpg')}}', fade: 1000},
            {url: '{{Url::to('assets-new/img/bg1.jpg')}}', fade: 1000},
            {url: '{{Url::to('assets-new/img/bj3.jpg')}}', fade: 1000}
        ]);


    </script>


@stop
