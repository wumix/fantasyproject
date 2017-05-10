@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center" style="color: #F9960E;">
                        Upcoming Tournaments
                    </h1>
                    <hr class="light full">

                </div>
            </div>
        </div>
    </section>
    <section class="publicaciones-blog-home no-padding">
        <div class="container">
            <div class="row adm">
                <div class="row mywebinar">
                    <div class="col-sm-10">
                        <h1 style="font-size: 20px;"><b><a style="color: white;" href="{{route('champion')}}"> Champions Trophy</a></b></h1></div>

                    <div class="col-sm-1">
                    </div>
                </div>
                <div class="row" style="margin-right: 0px; padding-top: 10px;">


                    <div class="col-sm-4" style="background-color: white;">
                        <div class="row" style="margin-right: 0px;">
                            <div class="col-sm-1">
                                <i style="color:red;" class="fa fa-calendar" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-6">
                                <p style="color: #C0C0C0;"> Date:&nbsp
                                    <b style="color: grey;">Tue 01, June</b></p></div>
                        </div>

                    </div>
                    <div class="col-sm-4" style="background-color: white;">
                        <div class="row" >
                            <div class="col-sm-1">
                                <i style="color:red;" class="fa fa-clock-o" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-11">
                                <p style="color: #C0C0C0;"> Time:&nbsp<b style="color: grey;"> 06:00pm</b></p></div>
                        </div>

                    </div>
                    <div class="col-sm-5" style="background-color: white;">
                        <div class="row" style="margin-right: 0px;">
                            <div class="col-sm-1">

                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row" style="margin-right: 0px; ">
                    <div class="col-sm-5" style="background-color: white;">
                        <div class="row">
                            <div class="col-sm-1">
                                <i style="color:red;" class="fa fa-map-signs" aria-hidden="true"></i></div>
                            <div class="col-sm-10">
                                <p style="color: #C0C0C0;"> Venue: &nbsp<b style="color: grey;">England</b></p></div>

                        </div>


                    </div>
                </div>








            </div>
        </div>
    </section>




@endsection