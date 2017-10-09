@extends('layouts.app')
@section('content')
    <section>
        @section('title')
            Privacy Policy
        @stop

        @section('css')
            <style>

                .player_details_wrapper {
                    font-family: 'Open Sans', Sans-Serif;
                    border: 2px solid #dadad9;
                    float: none;
                    margin: 0 auto 50px;
                    border-radius: 10px;
                    padding: 20px 0;
                }

                .player_details_wrapper .playeer_thumb_wrapper {

                }

                .player_details_wrapper .playeer_thumb_wrapper > img {
                    width: 100%;
                    height: auto;
                    border-radius: 10px;
                    border: 2px solid #aaa9a7;
                    margin-bottom: 15px;
                }

                .player_details_wrapper .playeer_thumb_wrapper .player_name {
                    color: #f6980e;
                    font-size: 18px;
                    text-transform: uppercase;
                    font-weight: 600;
                    margin-top: 0;
                    margin-bottom: 0;
                }

                .player_details_wrapper .playeer_thumb_wrapper .team_name {
                    font-weight: 600;
                    font-size: 18px;
                    color: #92b713;
                }

                .player_details_wrapper .playeer_details_wrapper {

                }

                .player_details_wrapper .playeer_details_wrapper p {
                    font-size: 15px;
                    margin-bottom: 2px;
                }

                .player_details_wrapper .playeer_details_wrapper span {
                    display: inline-block;
                    vertical-align: top;
                }

                .player_details_wrapper .playeer_details_wrapper .stat_title {
                    color: #f6980e;
                    margin-right: 5px;
                }

                .player_details_wrapper .playeer_details_wrapper .stat_desc {
                    color: #92b713;
                    width: 80%;
                }


                .player_bat_career_details_wrapper,
                .player_bowl_career_details_wrapper{
                    font-family: 'Open Sans', Sans-Serif;
                }

                .player_bat_career_details_wrapper h2,
                .player_bowl_career_details_wrapper h2{
                    color: #92b713;
                    font-size: 22px;
                    font-weight: 600;
                    margin-bottom: 20px;
                    text-transform: uppercase;
                }

                .player_bat_career_details_wrapper table,
                .player_bowl_career_details_wrapper table{
                    border-radius: 50px;
                }
                .player_bat_career_details_wrapper .colored_row,
                .player_bowl_career_details_wrapper .colored_row{
                    background: #92b713;
                }

                .player_bat_career_details_wrapper .colored_row th,
                .player_bowl_career_details_wrapper .colored_row th{
                    color: #fff;
                }

                .player_bat_career_details_wrapper .colored_row th,
                .player_bowl_career_details_wrapper .colored_row th,
                .player_bat_career_details_wrapper td,
                .player_bowl_career_details_wrapper td{
                    text-transform: uppercase;
                    font-weight: 400;
                    text-align: center;
                    font-size: 13px;
                }
                .player_bat_career_details_wrapper td:first-child,
                .player_bowl_career_details_wrapper td:first-child{
                    text-align: left;
                    width: 250px;
                    padding-left: 15px;
                }

                .player_bowl_career_details_wrapper td:first-child {
                    width: 314px;
                }

                .player_bat_career_details_wrapper .colored_row th:first-child,
                .player_bowl_career_details_wrapper .colored_row th:first-child {
                    border-top-left-radius: 4px;
                }
                .player_bat_career_details_wrapper .colored_row th:last-child,
                .player_bowl_career_details_wrapper .colored_row th:last-child{
                    border-top-right-radius: 4px;
                }

                .player_bowl_career_details_wrapper{
                    margin-bottom: 30px;
                }

            </style>
        @endsection
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        Statistics
                    </h1>
                    <hr class="light full">
                    <div class="page-content">

                        <!-- Player Details Wrapper Start -->
                        <div class="player_details_wrapper col-md-9 clearfix">

                            <!-- Player Thumb Start -->
                            <div class="playeer_thumb_wrapper col-md-3">
                                <div class="playeer_thumb_wrapper">
                                    <img src="{{URL::to('img/player_img.jpg')}}" alt="">

                                    <h3 class="player_name">Shaan Masood</h3>
                                    <span class="team_name">Pakistan</span>
                                </div>
                            </div>
                            <!-- Player Thumb End -->

                            <!-- Player Desc Start -->
                            <div class="playeer_details_wrapper col-md-9">
                                <p>
                                    <span class="stat_title">Full Name</span>
                                    <span class="stat_desc">Shaan Masood Khan</span>
                                </p>
                                <p>
                                    <span class="stat_title">Born</span>
                                    <span class="stat_desc">October 14, 1989, Kuwait</span>
                                </p>
                                <p>
                                    <span class="stat_title">Current Age</span>
                                    <span class="stat_desc">27 years 300 days</span>
                                </p>
                                <p>
                                    <span class="stat_title">Major Teams</span>
                                    <span class="stat_desc">Pakistan, Durham MCCU, Federal Areas, Karachi Whites,
                                        Pakistan Under-19s, Rest of Pakistan Under-19s</span>
                                </p>
                                <p>
                                    <span class="stat_title">Also known as</span>
                                    <span class="stat_desc">Shaan Masood</span>
                                </p>
                                <p>
                                    <span class="stat_title">Nickname</span>
                                    <span class="stat_desc">Shaani</span>
                                </p>
                                <p>
                                    <span class="stat_title">Playing Role</span>
                                    <span class="stat_desc">Opening Batsman</span>
                                </p>
                                <p>
                                    <span class="stat_title">Batting style</span>
                                    <span class="stat_desc">Left-hand bat</span>
                                </p>
                                <p>
                                    <span class="stat_title">Bowling style</span>
                                    <span class="stat_desc">Right-arm medium-fast</span>
                                </p>
                            </div>
                            <!-- Player Desc End -->

                        </div>
                        <!-- Player Details Wrapper End -->


                        <!-- Player Batting Details Wrapper Start -->
                        <div class="player_bat_career_details_wrapper col-md-12">
                            <h2>Batting and fielding averages</h2>

                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr class="colored_row">
                                    <th></th>
                                    <th>mat</th>
                                    <th>inns</th>
                                    <th>no</th>
                                    <th>runs</th>
                                    <th>hs</th>
                                    <th>ave</th>
                                    <th>bf</th>
                                    <th>sr</th>
                                    <th>100's</th>
                                    <th>50's</th>
                                    <th>4's</th>
                                    <th>6's</th>
                                    <th>ct</th>
                                    <th>st</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Test</td>
                                    <td>11</td>
                                    <td>22</td>
                                    <td>0</td>
                                    <td>528</td>
                                    <td>125</td>
                                    <td>24.00</td>
                                    <td>1229</td>
                                    <td>42.96</td>
                                    <td>1</td>
                                    <td>3</td>
                                    <td>48</td>
                                    <td>4</td>
                                    <td>10</td>
                                    <td>0</td>

                                </tr>
                                <tr>
                                    <td>First-class</td>
                                    <td>11</td>
                                    <td>22</td>
                                    <td>0</td>
                                    <td>528</td>
                                    <td>125</td>
                                    <td>24.00</td>
                                    <td>1229</td>
                                    <td>42.96</td>
                                    <td>1</td>
                                    <td>3</td>
                                    <td>48</td>
                                    <td>4</td>
                                    <td>10</td>
                                    <td>0</td>

                                </tr>
                                <tr>
                                    <td>List A</td>
                                    <td>11</td>
                                    <td>22</td>
                                    <td>0</td>
                                    <td>528</td>
                                    <td>125</td>
                                    <td>24.00</td>
                                    <td>1229</td>
                                    <td>42.96</td>
                                    <td>1</td>
                                    <td>3</td>
                                    <td>48</td>
                                    <td>4</td>
                                    <td>10</td>
                                    <td>0</td>

                                </tr>
                                <tr>
                                    <td>T20's</td>
                                    <td>11</td>
                                    <td>22</td>
                                    <td>0</td>
                                    <td>528</td>
                                    <td>125</td>
                                    <td>24.00</td>
                                    <td>1229</td>
                                    <td>42.96</td>
                                    <td>1</td>
                                    <td>3</td>
                                    <td>48</td>
                                    <td>4</td>
                                    <td>10</td>
                                    <td>0</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                        <!-- Player International Details Wrapper End -->

                        <!-- Player Domestic Details Wrapper Start -->
                        <div class="player_bowl_career_details_wrapper col-md-12">
                            <h2>Bowling Averages</h2>
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr class="colored_row">
                                    <th></th>
                                    <th>mat</th>
                                    <th>inns</th>
                                    <th>balls</th>
                                    <th>runs</th>
                                    <th>wkts</th>
                                    <th>bbi</th>
                                    <th>bbm</th>
                                    <th>ave</th>
                                    <th>econ</th>
                                    <th>sr</th>
                                    <th>4w</th>
                                    <th>5w</th>
                                    <th>10</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Test</td>
                                    <td>11</td>
                                    <td>22</td>
                                    <td>0</td>
                                    <td>528</td>
                                    <td>125</td>
                                    <td>24.00</td>
                                    <td>1229</td>
                                    <td>42.96</td>
                                    <td>1</td>
                                    <td>3</td>
                                    <td>48</td>
                                    <td>4</td>
                                    <td>10</td>

                                </tr>
                                <tr>
                                    <td>First-class</td>
                                    <td>11</td>
                                    <td>22</td>
                                    <td>0</td>
                                    <td>528</td>
                                    <td>125</td>
                                    <td>24.00</td>
                                    <td>1229</td>
                                    <td>42.96</td>
                                    <td>1</td>
                                    <td>3</td>
                                    <td>48</td>
                                    <td>4</td>
                                    <td>10</td>

                                </tr>
                                <tr>
                                    <td>List A</td>
                                    <td>11</td>
                                    <td>22</td>
                                    <td>0</td>
                                    <td>528</td>
                                    <td>125</td>
                                    <td>24.00</td>
                                    <td>1229</td>
                                    <td>42.96</td>
                                    <td>1</td>
                                    <td>3</td>
                                    <td>48</td>
                                    <td>4</td>
                                    <td>10</td>

                                </tr>
                                <tr>
                                    <td>T20's</td>
                                    <td>11</td>
                                    <td>22</td>
                                    <td>0</td>
                                    <td>528</td>
                                    <td>125</td>
                                    <td>24.00</td>
                                    <td>1229</td>
                                    <td>42.96</td>
                                    <td>1</td>
                                    <td>3</td>
                                    <td>48</td>
                                    <td>4</td>
                                    <td>10</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Player Domestic Details Wrapper End -->


                    </div>
                </div>
            </div>
        </div>
    </section>
@stop