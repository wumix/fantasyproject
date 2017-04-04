<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {!! Html::style('assets/font-awesome-4.7.0/css/font-awesome.css') !!}


        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gamithon Fantasy</title>
        {!! Html::style('assets/css/bootstrap.css') !!}


        <link rel="icon" href="favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon" href="psl-images/gf.ico" type="image/x-icon"/>
        {!! Html::style('assets/css/slicknav.css') !!}
        {!! Html::style('assets/css/nav.css') !!}




        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <div class="container-fluid " id="mhead">
            <div class="container">



                <h6>Hello Welcome To Gamithon Fantasy</h6>


                <div id="mh" >

                    @if(!Auth::check())
                    <a class="at" href="{{route('login')}}">Login <span class="mhline">|</span>
                    </a>
                    @endif
                    @if(!Auth::check())
                    <a class="at" href="{{ route('signUp') }}">
                        Sign Up <span class="mhline">|</span>
                    </a>
                    @endif
                    @if(Auth::check())
                    <a class="at" href="{{URL::to('profile-user')}}">
                        {{Auth::user()->name}} <span class="mhline">|</span>
                    </a>
                    @endif

                    @if(Auth::check())
                    <a onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="at" href="javacript:void(0)">
                        Logout
                        <span class="mhline"></span>
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- ..............................Nav Bar Start................................ -->
        <section>
            <nav class="navbar navbar-default navbar-fixed-top" id="nav1">
                <div class="container">
                    <div class="row">
                        <div class="navbar-header col-md-3">
                            <!-- Brand and toggle get grouped for better mobile display -->



                            <a class="navbar-brand " href="#"><img src="{{URL::asset('/assets/images/gamithon-logo1.png')}}"></a>

                        </div>
                        <div class="perant1 row" >
                            <div class="child1 col-md-1"><a href="#"><i class="fa fa-facebook-square fa-icon fa-md" id="sz1"></i></a></div>
                            <div class="child1 col-md-1"><a href="#"><i class="fa fa-skype fa-icon fa-md" id="sz1"></i></a></div>
                            <div class="child1 col-md-1"><a href="#"><i class="fa fa-twitter-square fa-icon fa-md" id="sz1"></i></a></div>
                            <div class="input-group child1 col-md-8" id="afc1">

                                <input type="text" class="form-control" id="afc1" placeholder="Search" name="q">
                                <div class="input-group-btn">
                                    <button id="serbtn" class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>

                                </div>
                            </div>



                        </div>
                    </div>
                    <div id="prependTo"></div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse col-md-7 mama" id="topFixedNavbar1" >
                        <ul class="nav navbar-nav" style="color:white; " id="menubtn">
                            <li>
                                <a href="{{route('home')}}" class="at">Home <span class="spn" style="padding-left:20px;">|</span></a>

                            </li>
                            <li>  <a  href="#">Tournaments<span class="spn">|</span></a>
                                <ul>
                                    <li><a class="dropawidth" href="">Leagues</a></li>
                                    <li><a class="dropawidth" href="">Matches</a></li>
                                    <li><a class="dropawidth" href="">Trophies</a></li>
                                    <li><a class="dropawidth" href="">Scadula</a></li>

                                </ul>
                            </li>
                            <li>  <a  href="#">Gallery  <span class="spn">|</span></a></li>
                            <li>  <a  href="#">Blog  <span class="spn">|</span></a></li>
                            <li>  <a  href="#">Artical  <span class="spn">|</span></a></li>
                            <li>  <a  href="#">Teams  <span class="spn">|</span></a>
                                <ul class="menwidth">
                                    <li ><a class="dropawidth" href="">Create Team</a></li>
                                    <li ><a class="dropawidth" href="">List Of Teams</a></li>

                                </ul>
                            </li>
                            <li>   <a  href="#" >Contact Us</a></li>

                        </ul>




                    </div>
                </div>
                <div class="clear clearfix"></div>
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
                        <p> @2017 Gamithon Fantasy.All Reserved</p>
                    </div>


                    <div class="col-md-6 text-center">
                        <div id="sz">
                            <a class="fnt" href="#"><i class="fa fa-facebook-square fa-icon " class="sz"></i></a>
                            <a href="#"><i class="fa fa-skype fa-icon" class="sz"></i></a>
                            <a href="#"><i class="fa fa-twitter-square fa-icon" class="sz"></i></a>
                        </div>
                        <img src="{{URL::asset('/assets/images/logo-footer.png')}}" class="logof">

                    </div>

                </div>
            </div>
            <div class="container-fluid fgreen"></div>
        </footer>
        <!--/.......................... Footer End............................../ -->


        <form id="logout-form" action="{{Url::to('/logout')}}" method="POST" style="display: none;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="submit" value="logout" style="display: none;">
        </form>

        {!! Html::script('assets/js/jquery.min.js') !!}
        {!! Html::script('assets/js/googlejquery.min.js') !!}
        {!! Html::script('assets/js/bootstrap.min.js') !!}
        {!! Html::script('assets/js/jquery.slicknav.min.js') !!}
        {!! Html::script('assets/jquery.countdown-2.2.0/jquery.countdown.min.js') !!}

        <script type="text/javascript">

            $(function () {
                $('#menubtn').slicknav({
                    prependTo: '#prependTo'
                });

            });


        </script>
        @yield('js')
        @yield('addteamjs')
    </body>
</html>
