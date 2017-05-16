@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center" style="color: #F9960E;">
                        Champions Trophy Fixtures
                    </h1>
                    <hr class="light full">

                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <?php $i = 1;?>
                @foreach($fixture_details['tournament_matches'] as $fixture)
                    <div class="col-md-6 venuefont">

                        <h5 class="mywebinar"> {{$fixture['team_one']}} 1 {{$fixture['team_two']}}</h5>

                        <div>
                            <p style="font-size: 15px">
                          <span class="text-left "><i class="fa fa-venus" aria-hidden="true">
                              </i> Venue :</span>{{$fixture['venue']}}
                            </p>

                        </div>


                        <div>
                            <span style="font-size: 15px" class="text-left"><i class="fa fa-calendar" aria-hidden="true"></i> Date :</span> {{formatDate($fixture['start_date'])}}

                        </div>


                    </div>
                    @if($i%2==0)
                        <div class="clearfix"></div>
                    @endif
                    <?php $i++; ?>
                @endforeach


            </div>
        </div>
    </section>


    {{--<section class="publicaciones-blog-home no-padding">--}}
    {{--<div class="container">--}}
    {{--<div class="row adm">--}}
    {{--<div class="row mywebinar">--}}
    {{--<div class="col-sm-10">--}}
    {{--<h1 style="font-size: 20px;"><b>Sri Lanka &nbsp; vs &nbsp;South Africa</b></h1></div>--}}

    {{--<div class="col-sm-1">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; padding-top: 10px;">--}}


    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-calendar" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6">--}}
    {{--<p style="color: #C0C0C0;"> Date:&nbsp--}}
    {{--<b style="color: grey;">Sat 03, June</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-clock-o" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-11">--}}
    {{--<p style="color: #C0C0C0;"> Time:&nbsp<b style="color: grey;"> 09:30 GMT</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}

    {{--</div>--}}
    {{--<div class="col-sm-7">--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; ">--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-map-signs" aria-hidden="true"></i></div>--}}
    {{--<div class="col-sm-10">--}}
    {{--<p style="color: #C0C0C0;"> Venue: &nbsp<b style="color: grey;">The Oval, London</b></p>--}}
    {{--</div>--}}

    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    {{--<section class="publicaciones-blog-home no-padding">--}}
    {{--<div class="container">--}}
    {{--<div class="row adm">--}}
    {{--<div class="row mywebinar">--}}
    {{--<div class="col-sm-10">--}}
    {{--<h1 style="font-size: 20px;"><b>India &nbsp; vs &nbsp;Pakistan</b></h1></div>--}}

    {{--<div class="col-sm-1">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; padding-top: 10px;">--}}


    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-calendar" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6">--}}
    {{--<p style="color: #C0C0C0;"> Date:&nbsp--}}
    {{--<b style="color: grey;">Sat 04, June</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-clock-o" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-11">--}}
    {{--<p style="color: #C0C0C0;"> Time:&nbsp<b style="color: grey;"> 09:30 GMT</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}

    {{--</div>--}}
    {{--<div class="col-sm-7">--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; ">--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-map-signs" aria-hidden="true"></i></div>--}}
    {{--<div class="col-sm-10">--}}
    {{--<p style="color: #C0C0C0;"> Venue: &nbsp<b style="color: grey;">edgbaston birmingham</b>--}}
    {{--</p></div>--}}

    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    {{--<section class="publicaciones-blog-home no-padding">--}}
    {{--<div class="container">--}}
    {{--<div class="row adm">--}}
    {{--<div class="row mywebinar">--}}
    {{--<div class="col-sm-10">--}}
    {{--<h1 style="font-size: 20px;"><b>Australia &nbsp; vs &nbsp;bangladesh</b></h1></div>--}}

    {{--<div class="col-sm-1">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; padding-top: 10px;">--}}


    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-calendar" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6">--}}
    {{--<p style="color: #C0C0C0;"> Date:&nbsp--}}
    {{--<b style="color: grey;">Mon 05, June</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-clock-o" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-11">--}}
    {{--<p style="color: #C0C0C0;"> Time:&nbsp<b style="color: grey;"> 12:30 GMT</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}

    {{--</div>--}}
    {{--<div class="col-sm-7">--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; ">--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-map-signs" aria-hidden="true"></i></div>--}}
    {{--<div class="col-sm-10">--}}
    {{--<p style="color: #C0C0C0;"> Venue: &nbsp<b style="color: grey;">The Oval, London</b></p>--}}
    {{--</div>--}}

    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    {{--<section class="publicaciones-blog-home no-padding">--}}
    {{--<div class="container">--}}
    {{--<div class="row adm">--}}
    {{--<div class="row mywebinar">--}}
    {{--<div class="col-sm-10">--}}
    {{--<h1 style="font-size: 20px;"><b>England &nbsp; vs &nbsp;New Zealand</b></h1></div>--}}

    {{--<div class="col-sm-1">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; padding-top: 10px;">--}}


    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-calendar" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6">--}}
    {{--<p style="color: #C0C0C0;"> Date:&nbsp--}}
    {{--<b style="color: grey;">Tue 06, June</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-clock-o" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-11">--}}
    {{--<p style="color: #C0C0C0;"> Time:&nbsp<b style="color: grey;"> 09:30 GMT</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}

    {{--</div>--}}
    {{--<div class="col-sm-7">--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; ">--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-map-signs" aria-hidden="true"></i></div>--}}
    {{--<div class="col-sm-10">--}}
    {{--<p style="color: #C0C0C0;"> Venue: &nbsp<b style="color: grey;">Cardiff Wales Stadium,--}}
    {{--Cardiff</b></p></div>--}}

    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    {{--<section class="publicaciones-blog-home no-padding">--}}
    {{--<div class="container">--}}
    {{--<div class="row adm">--}}
    {{--<div class="row mywebinar">--}}
    {{--<div class="col-sm-10">--}}
    {{--<h1 style="font-size: 20px;"><b>Pakistan &nbsp; vs &nbsp;South Africa</b></h1></div>--}}

    {{--<div class="col-sm-1">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; padding-top: 10px;">--}}


    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-calendar" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-7">--}}
    {{--<p style="color: #C0C0C0;"> Date:&nbsp--}}
    {{--<b style="color: grey;">Wed 07, June</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-clock-o" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-11">--}}
    {{--<p style="color: #C0C0C0;"> Time:&nbsp<b style="color: grey;"> 12:30 GMT</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}

    {{--</div>--}}
    {{--<div class="col-sm-7">--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; ">--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-map-signs" aria-hidden="true"></i></div>--}}
    {{--<div class="col-sm-10">--}}
    {{--<p style="color: #C0C0C0;"> Venue: &nbsp<b style="color: grey;">Edgbaston,--}}
    {{--Birmingham</b></p></div>--}}

    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    {{--<section class="publicaciones-blog-home no-padding">--}}
    {{--<div class="container">--}}
    {{--<div class="row adm">--}}
    {{--<div class="row mywebinar">--}}
    {{--<div class="col-sm-10">--}}
    {{--<h1 style="font-size: 20px;"><b>India &nbsp; vs &nbsp;Sri Lanka</b></h1></div>--}}

    {{--<div class="col-sm-1">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; padding-top: 10px;">--}}


    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-calendar" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-7">--}}
    {{--<p style="color: #C0C0C0;"> Date:&nbsp--}}
    {{--<b style="color: grey;">Wed 08, June</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-clock-o" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-11">--}}
    {{--<p style="color: #C0C0C0;"> Time:&nbsp<b style="color: grey;"> 09:30 GMT</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}

    {{--</div>--}}
    {{--<div class="col-sm-7">--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; ">--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-map-signs" aria-hidden="true"></i></div>--}}
    {{--<div class="col-sm-10">--}}
    {{--<p style="color: #C0C0C0;"> Venue: &nbsp<b style="color: grey;">The Oval London</b></p>--}}
    {{--</div>--}}

    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    {{--<section class="publicaciones-blog-home no-padding">--}}
    {{--<div class="container">--}}
    {{--<div class="row adm">--}}
    {{--<div class="row mywebinar">--}}
    {{--<div class="col-sm-10">--}}
    {{--<h1 style="font-size: 20px;"><b>New Zealand &nbsp; vs &nbsp;Bangladesh</b></h1></div>--}}

    {{--<div class="col-sm-1">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; padding-top: 10px;">--}}


    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-calendar" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-7">--}}
    {{--<p style="color: #C0C0C0;"> Date:&nbsp--}}
    {{--<b style="color: grey;">Fri 09, June</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-clock-o" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-11">--}}
    {{--<p style="color: #C0C0C0;"> Time:&nbsp<b style="color: grey;"> 09:30 GMT</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}

    {{--</div>--}}
    {{--<div class="col-sm-7">--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; ">--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-map-signs" aria-hidden="true"></i></div>--}}
    {{--<div class="col-sm-10">--}}
    {{--<p style="color: #C0C0C0;"> Venue: &nbsp<b style="color: grey;">Cardiff wales--}}
    {{--Stadium</b></p></div>--}}

    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    {{--<section class="publicaciones-blog-home no-padding">--}}
    {{--<div class="container">--}}
    {{--<div class="row adm">--}}
    {{--<div class="row mywebinar">--}}
    {{--<div class="col-sm-10">--}}
    {{--<h1 style="font-size: 20px;"><b>England &nbsp; vs &nbsp;Australia</b></h1></div>--}}

    {{--<div class="col-sm-1">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; padding-top: 10px;">--}}


    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-calendar" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-7">--}}
    {{--<p style="color: #C0C0C0;"> Date:&nbsp--}}
    {{--<b style="color: grey;">Sat 10, June</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-clock-o" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-11">--}}
    {{--<p style="color: #C0C0C0;"> Time:&nbsp<b style="color: grey;"> 09:30 GMT</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}

    {{--</div>--}}
    {{--<div class="col-sm-7">--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; ">--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-map-signs" aria-hidden="true"></i></div>--}}
    {{--<div class="col-sm-10">--}}
    {{--<p style="color: #C0C0C0;"> Venue: &nbsp<b style="color: grey;">edgbaston birmingham</b>--}}
    {{--</p></div>--}}

    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    {{--<section class="publicaciones-blog-home no-padding">--}}
    {{--<div class="container">--}}
    {{--<div class="row adm">--}}
    {{--<div class="row mywebinar">--}}
    {{--<div class="col-sm-10">--}}
    {{--<h1 style="font-size: 20px;"><b>India &nbsp; vs &nbsp;South Africa</b></h1></div>--}}

    {{--<div class="col-sm-1">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; padding-top: 10px;">--}}


    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-calendar" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-7">--}}
    {{--<p style="color: #C0C0C0;"> Date:&nbsp--}}
    {{--<b style="color: grey;">Sun 11, June</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-clock-o" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-11">--}}
    {{--<p style="color: #C0C0C0;"> Time:&nbsp<b style="color: grey;"> 09:30 GMT</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}

    {{--</div>--}}
    {{--<div class="col-sm-7">--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; ">--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-map-signs" aria-hidden="true"></i></div>--}}
    {{--<div class="col-sm-10">--}}
    {{--<p style="color: #C0C0C0;"> Venue: &nbsp<b style="color: grey;">The Oval London</b></p>--}}
    {{--</div>--}}

    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    {{--<section class="publicaciones-blog-home no-padding">--}}
    {{--<div class="container">--}}
    {{--<div class="row adm">--}}
    {{--<div class="row mywebinar">--}}
    {{--<div class="col-sm-10">--}}
    {{--<h1 style="font-size: 20px;"><b>Sri Lanka &nbsp; vs &nbsp;Pakistan</b></h1></div>--}}

    {{--<div class="col-sm-1">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; padding-top: 10px;">--}}


    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-calendar" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-7">--}}
    {{--<p style="color: #C0C0C0;"> Date:&nbsp--}}
    {{--<b style="color: grey;">Mon 12, June</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-4" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-clock-o" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<div class="col-sm-11">--}}
    {{--<p style="color: #C0C0C0;"> Time:&nbsp<b style="color: grey;"> 09:30 GMT</b></p></div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row" style="margin-right: 0px;">--}}
    {{--<div class="col-sm-1">--}}

    {{--</div>--}}
    {{--<div class="col-sm-7">--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" style="margin-right: 0px; ">--}}
    {{--<div class="col-sm-5" style="background-color: white;">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-1">--}}
    {{--<i style="color:red;" class="fa fa-map-signs" aria-hidden="true"></i></div>--}}
    {{--<div class="col-sm-10">--}}
    {{--<p style="color: #C0C0C0;"> Venue: &nbsp<b style="color: grey;">Cardiff wales,--}}
    {{--Cardiff</b></p></div>--}}

    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}


    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}


@endsection