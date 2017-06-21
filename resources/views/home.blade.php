@extends('layouts.app')
{{--{{dd($matches->t)}}--}}
@section('title')
    Gamithon Fantasy
@stop
@section('content')
    <!--BASBB-->
    <header id="header">
        <div id="abcd" class="header-content container">
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
                            <!-- style="margin-top: -20px;"-->
                            <div class="col-md-12 no-padding">

                                <h4 style="font-weight: 500;color: #FFFFFF">
                                    @if(!empty($leaders))
                                        Leader Board
                                    @endif
                                </h4>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 count-down no-padding">
                                @if(!empty($leaders))
                                    @foreach($leaders as $leader)
                                        <div class="col-md-4  text-center">
                                            <div class="circle2 leadersName">
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
                                @endif

                            </div>
                        </div>

                        @if(!empty($leaders))
                        <div class="row">
                            <div class="col-md-12 no-padding">

                                <h5>

                                    <a class="btn leaderboardviewmorebutton" href="{{route('homeleaderboard')}}">View
                                        More</a>

                                </h5>

                            </div>
                        </div>
                        @endif
                        <div class="clear clearfix"></div>
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
                            View all tournaments
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if(!empty($upcomming_tournaments_list))

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
                                @foreach($upcomming_tournaments_list as $tournament)
                                    <tr class="trr">
                                        <td class="border-r">
                                            <a href="{{route('fixturesdetail',['tournament_id'=>$tournament['slug']])}}">{{$tournament['name']}} </a>
                                        </td>
                                        <td class="border-r">{{$tournament['venue']}}</td>
                                        <td class="border-r">
                                            {{formatDate($tournament['start_date'])}}
                                        </td>
                                        <td>
                                            {{formatDate($tournament['end_date'])}}
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </section>
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
    {{--.............................Gallry Start..............................................--}}
    <section id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter popup-gallery">
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/201.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/201.jpg" class="img-responsive" alt="KXIP VS KKR">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Pakistan vs India
                                </div>
                                <div class="project-name">
                                    Pakistan won by 180 runs
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/202.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/202.jpg" class="img-responsive" alt="KXIP VS KKR">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Pakistan vs India
                                </div>
                                <div class="project-name">
                                    Pakistan won by 180 runs
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/203.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/203.jpg" class="img-responsive" alt="KXIP VS MI">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Pakistan vs India
                                </div>
                                <div class="project-name">
                                    Pakistan won by 180 runs
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/301.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/301.jpg" class="img-responsive" alt="KXIP VS MI">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Bangladesh Vs India
                                </div>
                                <div class="project-name">
                                    India won by 9 wickets
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/302.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/302.jpg" class="img-responsive" alt="KXIP VS MI">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Bangladesh Vs India
                                </div>
                                <div class="project-name">
                                    India won by 9 wickets
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/303.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/303.jpg" class="img-responsive" alt=" DD VS GL">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Bangladesh Vs India
                                </div>
                                <div class="project-name">
                                    India won by 9 wickets
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/thumbnails/101.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/101.jpg" class="img-responsive" alt=" DD VS GL">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    England VS Pakistan
                                </div>
                                <div class="project-name">
                                    Pakistan won by 8 wickets
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
                                    England VS Pakistan
                                </div>
                                <div class="project-name">
                                    Pakistan won by 8 wickets
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <a href="../img/portfolio/thumbnails/103.jpg" class="portfolio-box">
                        <img src="../img/portfolio/thumbnails/103.jpg" class="img-responsive" alt="KXIP VS KKR">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    England VS Pakistan
                                </div>
                                <div class="project-name">
                                    Pakistan won by 8 wickets
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
    {!! Html::script('assets/jquery.countdown-2.2.0/jquery.countdown.min.js') !!}
    @php($date= '00-00-00 00:00:00')
    @if(!empty($matches['start_date']))
        @php($date= $matches['start_date'])
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
    @endif


    <script>
        $('#header').backstretch([


            {
                url: '{{URL::to('assets-new/img/icc-banner-1.jpg')}}', fade: 500
            },

            {url: '{{URL::to('assets-new/img/champions-trophy-pakistan.jpg=')}}', fade: 500},
            {url: '{{URL::to('assets-new/img/latest-banner.jpg')}}', fade: 500},


        ]);


    </script>
    <script>
        $(function () {
            $('.itemsz, .leadersName').matchHeight('col-md-4');
        });

    </script>



@stop
