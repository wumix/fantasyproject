@extends('layouts.app')

@section('content')
<!--BASBB-->
<header>
    <div class="header-content">
        <div class="header-content-inner bg-primary1 col-md-6">
            <!--            <div class="row">
                            <div class="col-md-12 no-padding">
                                <h2 id="homeHeading" style="color: orange;">
                                    Leader Board
                                </h2>
                                <h3>
                                    Indian Premier League - 2k17
                                </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 count-down no-padding ">
            <?php for ($i = 1; $i < 4; $i++) { ?>
                                        <div class="col-md-4 text-center">
                                            <span class="possion">
                <?php
                if ($i == 1) {
                    echo $i . "<p style='font-size:24px; display:inline;'>st<p>";
                }
                if ($i == 2) {
                    echo $i . "<p style='font-size:24px; display:inline;'>nd<p>";
                }
                if ($i == 3) {
                    echo $i . "<p style='font-size:24px; display:inline;'>rd<p>";
                }
                ?>
                                            </span>
                                            <span class="circle2">
                                                <img class="circle2" src="http://localhost/gamithon/public/img/user1-128x128.jpg">
                                            </span>
                                            <p title="Name" class="mtb10" style="font-size: 14px; margin-top: -40px;">Ahmad Mughal</p>
                                            <p style="margin-top: -50px; font-size: 14px; color: #92B713;">Mughal Invensible</p>
                                            <p style="margin-top: -50px;font-size: 14px;">100000</p>
                                        </div>
            <?php } ?>
                            </div>
                        </div>-->
        </div>
        <div class="col-md-1"></div>
        <div class="header-content-inner bg-primary col-md-5">
            <div class="row">
                <div class="col-md-12 no-padding">
                    <h2>
                        Active Tournament
                    </h2>
                    <h2>
                        {{$tournaments_list[0]['name']}}
                    </h2>
                    <h2>
                        Next Match Count down
                    </h2>


                    <h4>
                        {{$matches['team_one']}}
                        <strong class="mlr10 Bold">
                            <em>Vs</em>
                        </strong>
                        {{$matches['team_two']}}
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 count-down no-padding mt30">
                    <div class="col-md-3 text-center">
                        <span id="getting-started" class="circle">
                            0
                        </span>
                        <p class="mtb10">Days</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <span id="getting-started1" class="circle">
                            0
                        </span>
                        <p class="mtb10">Hours</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <span id="getting-started2" class="circle">
                            0
                        </span>
                        <p class="mtb10">Minutes</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <span id="getting-started3" class="circle">
                            0
                        </span>
                        <p class="mtb10">Seconds</p>
                    </div>
                </div>
            </div>
            <div class="clear clearfix"></div>
        </div>
    </div>
</header>
<!--BASBB-->
<!-- ..........................Banner Start ............................-->
<!---------------------->

<section class="bg-primary" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">
                    Active Tournaments
                </h2>
                <hr class="light">
                <div class="table-responsive">
                    <table class="table table-striped table-stripedhome gen-table">
                        <thead class="main-taible-head" >
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
                                <td class="border-r">{{$row['start_date']}}</td>
                                <td >{{$row['end_date']}}</td>
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
                <a href="{{route('usertournamenthome')}}" class="btn btn-green btn-xl">
                    View all tournaments
                </a>
            </div>
        </div>
    </div>
</section>

<!---------------------->
<!-- LETS PLAY AT GAMITHON  Start-->
<section id="services" class="bg-dark how-to-play-summery">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">How to play Gamithon Fantasy</h2>
                <hr class="light">
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
                <a href="img/portfolio/fullsize/GALLERY-IMG5APR.jpg" class="portfolio-box">
                    <img src="img/portfolio/thumbnails/GALLERY-IMG5APR.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                SRH vs RCB
                            </div>
                            <div class="project-name">
                                SRH won by 7 wickets
                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-lg-4 col-sm-6">
                <a href="img/portfolio/fullsize/GALLERY-IMG6APR1.jpg" class="portfolio-box">
                    <img src="img/portfolio/thumbnails/GALLERY-IMG6APR1.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                GL vs KKR
                            </div>
                            <div class="project-name">
                                KKR won by 11 wickets
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="img/portfolio/fullsize/GALLERY-IMG7APR2.jpg" class="portfolio-box">
                    <img src="img/portfolio/thumbnails/GALLERY-IMG7APR2.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                KxiP vs RPS
                            </div>
                            <div class="project-name">
                                KxiP won by 7 wickets
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="../img/portfolio/fullsize/GALLERY-IMG8APR1.jpg" class="portfolio-box">
                    <img src="../img/portfolio/thumbnails/GALLERY-IMG8APR1.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                RPS vs MI
                            </div>
                            <div class="project-name">
                                RPS won by 8 wickets
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="img/portfolio/fullsize/GALLERY-IMG8APR2ND.jpg" class="portfolio-box">
                    <img src="img/portfolio/thumbnails/GALLERY-IMG8APR2ND.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                RCB vs DD
                            </div>
                            <div class="project-name">
                                RCB won by 3 wickets
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="img/portfolio/fullsize/GALLERY-IMG9APR.jpg" class="portfolio-box">
                    <img src="img/portfolio/thumbnails/GALLERY-IMG9APR.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                SRH vs GL
                            </div>
                            <div class="project-name">
                                SRH won by 10 wickets
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="img/portfolio/fullsize/GALLERY-IMG92ND-2.jpg" class="portfolio-box">
                    <img src="img/portfolio/thumbnails/GALLERY-IMG92ND-2.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                MI vs KKR
                            </div>
                            <div class="project-name">
                                MI won by 5 wickets
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="img/portfolio/fullsize/GALLERY-IMG10APR1.jpg" class="portfolio-box">
                    <img src="img/portfolio/thumbnails/GALLERY-IMG10APR1.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                KxiP vs RCB
                            </div>
                            <div class="project-name">
                                KxiP won by 9 wickets
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="img/portfolio/fullsize/GALLERY-IMG10APR-2.jpg" class="portfolio-box">
                    <img src="img/portfolio/thumbnails/GALLERY-IMG10APR-2.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                KxiP vs RCB
                            </div>
                            <div class="project-name">
                                KxiP won by 9 wickets
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
@php($date= $matches['start_date']);
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

@stop