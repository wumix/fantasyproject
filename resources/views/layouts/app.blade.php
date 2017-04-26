<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>


    <link rel="icon" href="../img/gamithon-fevi.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="../img/gamithon-fevi.ico" type="image/x-icon"/>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gamithon Fantasy</title>

    <!-- Bootstrap Core CSS -->
{!! Html::style('assets-new/vendor/bootstrap/css/bootstrap.min.css') !!}
{!! Html::style('assets-new/css/bootstrap-tour.css') !!}
{!! Html::style('assets-new/css/jquery.mCustomScrollbar.css') !!}
{!! Html::style('https://fonts.googleapis.com/css?family=Raleway') !!}
{!! Html::style('assets-new/vendor/font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800') !!}
{!! Html::style('https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic') !!}
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    {!! Html::style('assets-new/vendor/magnific-popup/magnific-popup.css') !!}
    {!! Html::style('assets/css/slicknav.css') !!}
    {!! Html::style('assets-new/css/creative.css') !!}
    {!! Html::style('assets-new/css/style.css') !!}


    {!! Html::style('assets-new/vendor/basic-table/basictable.css') !!}
    <style>


        .slick_nav li {
            list-style: none;
            overflow: hidden;
            padding: 0;
            margin: 0 0 0 0;

        }
    </style>


</head>
<body>
<nav class="bg-primary navbar navbar-default navbar-fixed-top">
    <!--Menu-->

    <!-------------->
    <div class="container-fluid">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header main-top-menu">
                <a class="navbar-brand logo-site page-scroll" href="/">
                    <img src="{{URL::to('assets-new/img/gamithon-logo1.png')}}" style="width: 250px;"/>
                </a>
                <div id="top-menu-res" class="jquerySlickNavContainer"></div>
                <div class="clear clearfix"></div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->


            <div class="collapse navbar-collapse logo-menu-container" id="bs-example-navbar-collapse-1">


                <div class="row">
                    <ul class="nav navbar-nav navbar-left nav-main-menu nav-main-menu-top" style="top:0;right: 0;">
                        @if(Auth::check())
                            <li class="menupadding">
                                <a href="{{route('userdashboard')}}"> <i style="color: #F9970E" class="fa fa-tachometer sign-in-icon" aria-hidden="true"></i>
                                    DashBoard</a>
                            </li>
                        @endif
                        @if(!Auth::check())
                            <li class="menupadding">
                                <a href="{{route('login')}}"> <i class="fa fa-sign-in sign-in-icon"
                                                                 aria-hidden="true"></i>
                                    Sign In</a>
                            </li>
                        @endif
                        @if(Auth::check())
                            <li class="menupadding">
                                <a onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" href="javacript:void(0)">
                                    <i class="fa fa-sign-out sign-in-icon" aria-hidden="true"></i>
                                    Logout
                                </a>
                            </li>
                        @endif
                    </ul>
                    <!--Bottom-->
                    <ul class="nav navbar-nav navbar-right nav-main-menu">
                        <li>
                            <a class="page-scroll" href="/">Home</a>
                        </li>

                        <li>
                            <a class="page-scroll" href="{{route('howPlay')}}">
                                How to play
                            </a>
                        </li>
                        <li>

                            <a class="page-scroll" href="{{route('showBlog')}}">
                                Gamithon Gossips
                            </a>
                        </li>

                        {{--<li>--}}
                        {{--<a href="{{route('leaderboard')}}">--}}
                        {{--LeaderBoard--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        @if(!has_user_team(Auth::id()))
                            <li id="create-your-team">

                                <a class="page-scroll" href="{{route('addTeam', ['tournament_id'=>1])}}">
                                    Create Team
                                </a>
                            </li>
                        @endif
                        <li>
                            <a class="page-scroll" href="{{route('usertournamenthome')}}">
                                Tournaments
                            </a>
                        </li>

                        @if(Auth::check())
                            <li>
                                <a href="{{route('teamHome')}}" class="page-scroll">
                                    My Team
                                </a>
                            </li>
                    @endif
                    <!--                            <li>
                                                            <a class="page-scroll" href="{{route('UserDashboard')}}">DashBoard</a>
                                                        </li>-->
                        <li>
                            <a href="{{URL::to('/#portfolio')}}" class="page-scroll">
                                Gallery
                            </a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{route('contactPage')}}">Contact Us</a>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- /.navbar-collapse -->


        </div>
    </div>
    <!-- /.container-fluid -->
</nav>
<!---->
@yield('content')
<footer>
    <div class="clear clearfix"></div>

    <form id="logout-form" action="{{Url::to('/logout')}}" method="POST" style="display: none;">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" value="logout" style="display: none;">
    </form>

    <section class="footer">
        <div class="container">
            <div class="row" id="final-footer">
                <div class="col-sm-12 col-md-4 text-left">
                    Copyright © 2017 Gamithon Fantasy.<br/> All Rights Reserved
                </div>
                <div class="col-sm-12 col-md-4 text-center">
                    <ul class="nav navbar-nav">

                        <li>
                            <a class="page-scroll" href="{{route('TermsCon')}}">
                               Terms & Conditions
                            </a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{route('PrivacyPolicy')}}">
                                Privacy Policy
                            </a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{route('contactPage')}}">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-4 text-right">
                    <a href="https://www.facebook.com/gamithonfantasy/" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle text-info fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                    </a>
                    <a href="https://twitter.com/GamithonFantasy" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle text-info fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</footer>
<!---->

<!-- jQuery -->
{!! Html::script('assets-new/vendor/jquery/jquery.min.js') !!}

{!! Html::script('assets-new/vendor/bootstrap/js/bootstrap.min.js') !!}

{!! Html::script('assets-new/vendor/basic-table/jquery.basictable.min.js') !!}
{!! Html::script('assets/js/jquery.slicknav.min.js') !!}
<!-- Plugin JavaScript -->
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js') !!}
{!! Html::script('assets-new/js/scrollreveal.min.js') !!}
{!! Html::script('assets-new/js/bootstrap-tour.js') !!}
{!! Html::script('assets-new/js/jquery.magnific-popup.min.js') !!}
{!! Html::script('assets-new/js/creative.js') !!}
{!! Html::script('assets-new/js/jquery.mCustomScrollbar.min.js') !!}
{!! Html::script('assets-new/js/jquery.mCustomScrollbar.concat.min.js') !!}


<script>

    (function($){
        $(window).on("load",function(){
            $(".content").mCustomScrollbar();
        });
    })(jQuery);
    $(".content").mCustomScrollbar({
        theme:"light-thin"
    });
    $(".content").mCustomScrollbar({
        axis:"x" // horizontal scrollbar

    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#bs-example-navbar-collapse-1').slicknav({
            appendTo: '#top-menu-res',
            label: 'Main Menu'
        });
        //                $('table').basictable({
        //                  forceResponsive: false
        //                });
    });
</script>
{!! Html::script('assets-new/js/jquery.backstretch.min.js') !!}

@yield('js')
@yield('addteamjs')



</body>
