<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        {!! Html::style('assets/font-awesome-4.7.0/css/font-awesome.min.css') !!}


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gamithon Fantasy</title>
        <!-- Bootstrap -->
        <!-- <link href="../../../../xampp/htdocs/shop1/css/bootstrap.css" rel="stylesheet"> -->
        {!! Html::style('assets/css/bootstrap.css') !!}
        <link rel="icon" href="{{URL::asset('/assets/images/favicon.ico')}}" type="image/x-icon"/>
        <link rel="shortcut icon" href="{{URL::asset('/assets/images/psl-images/gf.ico')}}" type="image/x-icon"/>
        {!! Html::style('assets/css/nav.css') !!}

    </head>
    <div class="container-fluid" id="mhead">
        <div class="container">
            <div class="row">

                <div class="col-md-6" style="text-align:left;">
                    <h6>Hello Welcome To Gamithon Fantasy</h6>
                </div>

                <div class="col-md-6" style="padding-top: 5px; text-align:right;">

                    @if(!Auth::check())
                    <a class="at" href="{{route('login')}}">Login <span class="mhline">|</span></a>
                    </a>
                    @endif
                    @if(!Auth::check())
                    <a class="at" href="{{ url('/register') }}">Sign Up <span class="mhline">|</span></a>
                    </a>
                    @endif

                    @if(Auth::check())
                    <a onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="at" href="{{route('login')}}">Logout
                        <span class="mhline">|</span></a>
                    </a>
                    @endif
                    <a class="at" href="#">Help <span class="mhline">|</span></a>
                </div>
            </div>
        </div>
    </div>

    <body>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- <script src="../../../../xampp/htdocs/shop1/js/jquery-1.11.2.min.js"></script> -->

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <!-- ..............................Nav Bar Start................................ -->
        <section>
            <nav class="navbar-default" id="nav1">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#topFixedNavbar1"><span class="sr-only">Toggle navigation</span><span
                                class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a class="navbar-brand" href="#"><img src="{{URL::asset('/assets/images/gamithon-logo1.png')}}"></a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="topFixedNavbar1">
                        <ul class="nav navbar-nav" style="color:white; padding-top:45px">
                            <li><a href="/" class="at"><span class="spn1">Home </span><span class="spn">|</span></a>
                                @if(Auth::check())
                            <li><a href="{{route('profile')}}"><span class="spn1">Profile </span> <span class="spn">|</span></a></li>

                            @endif
                            @if(Auth::check())
                            <li><a href="{{route('profile')}}"><span class="spn1">Make Your Team</span> <span class="spn">|</span></a></li>

                            @endif


                            <li><a href="#"><span class="spn1">Leagues</span> <span class="spn">|</span></a></li>
                            <li><a href="#"><span class="spn1">Tournaments </span> <span class="spn">|</span></a></li>
                            <li><a href="#"><span class="spn1">Gallery</span> <span class="spn">|</span></a></li>
                            <li><a href="#"><span class="spn1">Contact Us</span></a></li>

                        </ul>


                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </section>
        <!-- ..................Nav Bar End .................................-->
        @yield('content')
        <!-- /.....................footer Start......................../ -->


        <footer>
            <div class="container-fluid">

                <div class="row" style="background-color: black;opacity: 0.7;">

                    <div class="col-md-6 text-center cop">

                        <p class="rights-reserved"><i class="fa fa-copyright" aria-hidden="true"></i>
                            2017 Gamithon Fantasy. All Rights Reserved
                        </p>
                    </div>


                    <div class="col-md-6 text-center">
                        <div id="sz">
                            <a class="fnt" href="#"><i class="fa fa-twitter-square fa-icon " class="sz"></i></a>
                            <a href="#"><i class="fa fa-skype fa-icon" class="sz"></i></a>
                            <a href="#"><i class="fa fa-facebook-square fa-icon" class="sz"></i></a>
                        </div>
                        <img src="{{URL::asset('/assets/images/logo-footer.png')}}" class="logof">

                    </div>

                </div>
            </div>
            <div class="container-fluid fgreen"></div>
        </footer>
        <!--/.......................... Footer End............................../ -->
        {!! Html::script('assets/js/jquery-3.2.0.min.js') !!}
        {!! Html::script('assets/js/bootstrap.min.js') !!}
        {!! Html::script('assets/js/nav.js') !!}
        {!! Html::script('assets/jquery.countdown-2.2.0/jquery.countdown.min.js') !!}


        <form id="logout-form" action="http://gamithon.dev/logout" method="POST" style="display: none;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="submit" value="logout" style="display: none;">
        </form>
        @yield('js')
    </body>
</html>
