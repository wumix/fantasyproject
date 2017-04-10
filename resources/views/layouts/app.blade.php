<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gamithon Fantasy</title>
        <!-- Bootstrap Core CSS -->
        {!! Html::style('assets-new/vendor/bootstrap/css/bootstrap.min.css') !!}
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
        {!! Html::style('assets/css/slicknav.css') !!}
        {!! Html::style('assets-new/css/creative.css') !!}
        {!! Html::style('assets-new/css/style.css') !!}
        {!! Html::style('assets-new/vendor/basic-table/basictable.css') !!}
    </head>
    <body>
        <nav class="bg-primary navbar navbar-default navbar-fixed-top">
            <!--Menu-->
            <div class="container-fluid menu-top1-1">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-top-1">
                            <span class="sr-only">Toggle navigation</span> Useful Links <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand page-scroll">
                            &nbsp;
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-top-1">
                        <ul class="nav navbar-nav navbar-right">

                            @if(!Auth::check())
                            <li>
                                <a href="{{route('login')}}">
                                    Login 
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('signUp') }}">
                                    Sign Up
                                </a>
                            </li>
                            @endif
                            @if(Auth::check())
                                    <li>
                                        <a href="{{route('UserDashboard')}}">
                                            DashBoard
                                        </a>
                                    </li>
                            <li>
                                <a href="#">
                                    {{Auth::user()->name}}
                                </a>
                            </li>

                            <li>
                                <a onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" href="javacript:void(0)">
                                    Logout
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </div>
            <!-------------->
            <div class="container-fluid">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header main-top-menu">
                        <a class="navbar-brand logo-site page-scroll" href="/">
                            <img src="{{URL::to('assets-new/img/gamithon-logo1.png')}}" style="width: 250px;" />
                        </a>
                        <div id="top-menu-res" class="jquerySlickNavContainer"></div>
                        <div class="clear clearfix"></div>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse logo-menu-container" id="bs-example-navbar-collapse-1">
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
                                <a class="page-scroll" href="{{route('showTournament', ['tournament_id'=>1])}}">
                                    Create Team
                                </a>
                            </li>
                            <li>
                                <a class="page-scroll" href="{{route('usertournamenthome')}}">
                                    Tournaments
                                </a>
                            </li>

                            @if(Auth::check())
                            <li>
                                <a href="{{route('addTeam', ['tournament_id'=>1])}}" class="page-scroll">
                                    My Team
                                </a>
                            </li>
                            @endif
                            <!--                            <li>
                                                            <a class="page-scroll" href="{{route('UserDashboard')}}">DashBoard</a>
                                                        </li>-->
                            <li>
                                <a class="page-scroll" href="{{route('contactPage')}}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!---->
        @yield('content')
        <!---->
        <footer>
            <form id="logout-form" action="{{Url::to('/logout')}}" method="POST" style="display: none;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" value="logout" style="display: none;">
            </form>

            <section class="bg-primary footer">
                <div class="container">
                    <div class="row" id="final-footer">
                        <div class="col-sm-12 col-md-4 text-left">
                            Copyright © 2017 Gamithon Fantasy.<br/> All Rights Reserved
                        </div>
                        <div class="col-sm-12 col-md-4 text-center">
                            <ul class="nav navbar-nav" >
                                <li>
                                    <a class="page-scroll" href="{{route('privacyPolicy')}}">
                                        Privacy policy
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
        <!-- jQuery -->
        {!! Html::script('assets-new/vendor/jquery/jquery.min.js') !!}
        {!! Html::script('assets-new/vendor/bootstrap/js/bootstrap.min.js') !!}
        {!! Html::script('assets-new/vendor/basic-table/jquery.basictable.min.js') !!}
        {!! Html::script('assets/js/jquery.slicknav.min.js') !!}
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
        @yield('js')
        @yield('addteamjs')
    </body>
</html>
