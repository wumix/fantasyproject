<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome to GamithonFantasy</title>
    {!! Html::style('https://fonts.googleapis.com/css?family=Raleway') !!}
    {!! Html::style('assets-new/vendor/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800') !!}
    {!! Html::style('https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic') !!}

    <style type="text/css">
        .whole_setio_news {
            max-width: 800px;
            display: block;
            margin: 0 auto;
        }

        .black_area {
            width: 100%;
            display: inline-block;
            background: #000;
            padding: 10px 10px;
            float: left;
        }

        .text {
            float: left;
            color: #fff;
        }

        .link_hello {
            float: right;
            display: inline-block;
            color: greenyellow;
        }

        .banner_area {
            width: 100%;
            display: inline-block;
        }

        .logo {
            width: 100%;
            display: inline-block;
            padding: 30px 0;
        }

        .logo img {
            width: 24%;
            display: inline-block;
            margin-left: 15px;
        }

        .parah_section {
            width: 100%;
            display: inline-block;
            padding: 20px 30px;
        }

        .text_news {
            width: 100%;
            display: inline-block;
            font-size: 18px;
            color: #000;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .parah_new {
            width: 100%;
            display: inline-block;
            font-size: 16px;
            color: #000;
        }

        .free_roll_text {
            width: 100%;
            display: inline-block;
            text-align: center;
            font-size: 18px;
            color: #000;
            font-weight: bold;
        }

        .paly_btn {
            width: 150px;
            background: green;
            color: #fff;
            border-radius: 5px;
            padding: 10px 0;
            display: block;
            margin: 15px auto;
            text-align: center;
        }

        .how_to_play_sec {
            width: 100%;
            display: inline-block;
            background: #000;

        }

        .section_heading {
            width: 100%;
            display: inline-block;
            color: #fff;
            font-size: 25px;
            font-weight: bold;
            padding: 10px 30px;
            text-align: center;
        }

        .service_list {
            width: 100%;
            display: inline-block;
            float: left;
            text-align: center;
        }

        .service_list li {
            width: 33%;
            display: inline-block;
            float: left;
        }

        .service_list li a {
            color: #fff;
        }

        .footer_section {
            width: 100%;
            display: inline-block;
            background: #333;
            text-align: center;

        }

        .footer_logo {
            width: 100%;
            display: inline-block;
            padding: 30px 0;
        }

        .footer_logo img {
            width: 40%;
            display: inline-block;
        }

        .social_list {
            width: 100%;
            display: inline-block;
            text-align: center;
            padding: 0;
            margin-bottom: 20px !important;
        }

        .social_list li {
            width: 7%;
            display: inline-block;
            padding-right: 20px;
        }

        .links_list {
            width: 100%;
            display: inline-block;
            border-top: 1px solid #eee;
            text-align: center;
            padding: 10px 0;
        }

        .links_list li {
            width: 16%;
            display: inline-block;
            padding-right: 20px;
        }

        .links_list li a {
            color: rgb(168, 176, 182);
        }

        .anchor-htp {
            display: block;
            float: right;
            padding: 10px 10px;
        }

        .anchor-htp a {
            color: #5DBE19;
        }
    </style>
</head>
<body>

<div class="whole_setio_news">
    <div class="black_area">
    <span class="text">
    WELCOME TO Gamithon Fantasy!
    </span>
    </div>
    <div class="banner_area">
        <img src={{URL::to('/img/icc-champ-banner.jpg')}} alt=""/>
    </div>
    <div class="parah_section">
        <span class="text_news">
            Hi {{$name}}
        </span>
        <p class="parah_new">
            Thank you for your registration at Gamithon fantasy. Lots of exciting prizes are waiting for you every day!
            You can win these prizes just by making your favorite squad. </p>

        <span class="free_roll_text">I'd like to invite you to play today's Free-Roll</span>
        <a href="http://www.gamithonfantasy.com/login/" class="paly_btn">Play Now</a>
    </div>
    <div class="how_to_play_sec">
        <span class="section_heading">How to play Gamithon Fantasy</span>
        <ul class="service_list">
            <li>
                <div class="service-box">
                    <a>
                        <i class="fa fa-4x fa-user-plus sr-icons" data-sr-id="2"
                           style="; visibility: visible;  -webkit-transform: scale(1); opacity: 1;transform: scale(1); opacity: 1;-webkit-transition: -webkit-transform 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s; transition: transform 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s; "></i>
                        <p class="text-muted">
                            SIGN UP TO PLAY AT GAMITHON
                        </p>
                    </a>
                </div>
            </li>
            <li>
                <div class="service-box">
                    <a disabled="disabled">
                        <i class="fa fa-4x fa-users sr-icons" data-sr-id="3"
                           style="; visibility: visible;  -webkit-transform: scale(1); opacity: 1;transform: scale(1); opacity: 1;-webkit-transition: -webkit-transform 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s; transition: transform 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s; "></i>
                        <p class="text-muted">
                            CREATE YOUR TEAM
                        </p>
                    </a>
                </div>
            </li>
            <li>
                <div class="service-box">
                    <a disabled="true">
                        <i class="fa fa-4x fa-trophy sr-icons" data-sr-id="4"
                           style="; visibility: visible;  -webkit-transform: scale(1); opacity: 1;transform: scale(1); opacity: 1;-webkit-transition: -webkit-transform 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s; transition: transform 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s; "></i>
                        <p class="text-muted">
                            SELECT PLAYERS AND WIN PRIZES!
                        </p>
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <div class="footer_section">
        <span class="footer_logo"><img src={{URL::to('/img/gamithon-logo1.png')}} alt=""/></span>
        <ul class="social_list">
            <li>
                <a href="https://www.facebook.com/gamithonfantasy" class="">
                    <img src="{{URL::to('/img/fb.png')}}" alt=""/>
                </a>
            </li>
            <li>
                <a href="https://twitter.com/GamithonFantasy" class="">
                    <img src="{{URL::to('/img/tw.png')}}" alt=""/>
                </a>
            </li>
        </ul>
        <ul class="links_list">
            <li>
                <a href="http://www.gamithonfantasy.com/how-to-play" class="">How to play</a>
            </li>
            <li>
                <a href="http://www.gamithonfantasy.com/contact" class="">Contact Us</a>
            </li>
        </ul>
    </div>
</div>
</body>
</html>


