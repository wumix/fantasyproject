@extends('layouts.app')
{{--{{dd($matches->t)}}--}}
@section('title')
    How To Play at Gamithon Fantasy
@stop
@section('css')
    <style>
        .how_play_sec{
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow:0px 0px 27px rgba(0,0,0,0.21);
            padding: 50px 36px;
            margin: 25px 0;
        }
        .scorin_bord_sec{
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow:0px 0px 27px rgba(0,0,0,0.21);
            padding:50px 36px 0 36px;
            margin-bottom: 10px;
        }
        .sign_text{
            font-size: 14px;
            color: #333333;
        }
        .sign_text span{
            color: #92b713;
        }
        .sign_up_imp{
            width: 100%;
            display: inline-block;
            text-align: center;
            padding: 15px 0px 55px 0;
        }
        ul{
            padding: 0;
        }
        li{
            list-style: none;
        }

        @media all and (min-width: 100px) and (max-width: 768px) {
            .sign_up_imp img{
                width: 377px;
            }
            .scorin_bord_sec p{
                text-align: justify;
            }
        }
        @media all and (min-width: 100px) and (max-width: 480px) {
            .sign_up_imp img {
                width: 251px;
            }

            .scorin_bord_sec p{
                text-align: justify;
            }
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-heading">
                    How to play
                </h1>
                <hr class="light full">
            </div>
            <div class="how_play_sec">
                <div class="col-md-12 no-padding">
                    <ul>
                        <li>
                            <div class="sign_text">1. <span>Sign up</span> for an account</div>
                            <span class="sign_up_imp"><img src={{URL::to('/img/sign-up_imp.png')}} alt=""/></span>
                        </li>
                        <li>
                            <div class="sign_text">2. Go for <span>Create The Team</span></div>
                            <span class="sign_up_imp"><img src={{URL::to('/img/sign-up_imp2.png')}} alt=""/></span>
                        </li>
                        <li>
                            <div class="sign_text">3. Create your own Fantasy team with your <span>Favorite Players</span> in the tournament</div>
                            <span class="sign_up_imp"><img src={{URL::to('/img/sign-up_imp3.png')}} alt=""/></span>
                        </li>
                        <li>
                            <div class="sign_text">4. Every new user earns free <span>100,000</span> points</div>
                            <span class="sign_up_imp"><img src={{URL::to('/img/sign-up_imp4.png')}} alt=""/></span>
                        </li>
                        <li>
                            <div class="sign_text">5. Catch your <span>points</span> when your players score runs, take wickets, etc</div>
                            <span class="sign_up_imp"><img src={{URL::to('/img/sign-up_imp5.png')}} alt=""/></span>
                        </li>
                        <li>
                            <div class="sign_text">6. You can win exciting prizes once you make your way into the<span>leader board</span> </div>
                            <span class="sign_up_imp"><img src={{URL::to('/img/sign-up_imp6.png')}} alt=""/></span>
                        </li>
                        <li>
                            <div class="sign_text">7. If you win you will be surprised with the Prize<span>- Terms & Conditions </span> Apply</div>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="scorin_bord_sec">
                <div class="col-md-12">
                    <p>
                        What is fantasy Cricket?
                    </p>
                    <p>
                        It's a skill-based game that makes you experience the thrill of a coach who would go
                        through before playing every match - a real test of your cricketing skills, your
                        knowledge and understanding of player strengths and weaknesses.
                        You will have to select a team of 11 from a pool of players and compete with other users
                        from all over the world. Winners get exciting cash prizes!

                    </p>
                </div>
                <div class="col-md-12 no-padding">
                    <h3 class="text-center">Score rules</h3>
                    <div class="table-responsive">
                        <div class="panel with-nav-tabs panel">
                            <div class="panel-heading">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#action-1" data-toggle="tab" aria-expanded="true">
                                            Bowling
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#action-2" data-toggle="tab" aria-expanded="false">
                                            Fielding
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#action-3" data-toggle="tab" aria-expanded="false">
                                            Batting
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#action-4" data-toggle="tab" aria-expanded="false">
                                            Bonus
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="action-1">
                                        <div class="table-responsive col-md-12">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Rule</th>
                                                    <th>Points</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="cwt">
                                                    <td>
                                                        Each Maiden
                                                    </td>
                                                    <td>
                                                        7000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        R.R.P.O : 9.01 - Above
                                                    </td>
                                                    <td>
                                                        -30000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        R.R.P.O : 7.01 - 9
                                                    </td>
                                                    <td>
                                                        -20000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        R.R.P.O : 1 - 2.5
                                                    </td>
                                                    <td>
                                                        25000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        R.R.P.O : 2.51 - 3
                                                    </td>
                                                    <td>
                                                        20000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        R.R.P.O : 3.01 - 3.5
                                                    </td>
                                                    <td>
                                                        10000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        R.R.P.O : 3.51 - 4.5
                                                    </td>
                                                    <td>
                                                        5000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        R.R.P.O : 5.01 - 6
                                                    </td>
                                                    <td>
                                                        -10000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        R.R.P.O : 6.01 - 7
                                                    </td>
                                                    <td>
                                                        -15000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Wicket Taken : 1 - Above
                                                    </td>
                                                    <td>
                                                        20000
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="action-2">
                                        <div class="table-responsive col-md-12">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Rule</th>
                                                    <th>Points</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="cwt">
                                                    <td>
                                                        Per Catch
                                                    </td>
                                                    <td>
                                                        10000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Per WK Catch
                                                    </td>
                                                    <td>
                                                        8000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Per Run Out (Direct Hit)
                                                    </td>
                                                    <td>
                                                        15000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Per Run Out (Indirect Hit for every player involved)
                                                    </td>
                                                    <td>
                                                        10000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Per Stumping
                                                    </td>
                                                    <td>
                                                        15000
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="action-3">
                                        <div class="table-responsive col-md-12">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Rule</th>
                                                    <th>Points</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="cwt">
                                                    <td>
                                                        Each Run Scored
                                                    </td>
                                                    <td>
                                                        1000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Duck
                                                    </td>
                                                    <td>
                                                        -10000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Golden/Diamond duck
                                                    </td>
                                                    <td>
                                                        -20000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Scoring Rate : 1 - 60
                                                    </td>
                                                    <td>
                                                        -15000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Scoring Rate : 80 - 99.99
                                                    </td>
                                                    <td>
                                                        5000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Scoring Rate : 100 - 119.99
                                                    </td>
                                                    <td>
                                                        10000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Scoring Rate : 120 - 149.99
                                                    </td>
                                                    <td>
                                                        15000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Scoring Rate : 150 - 199.99
                                                    </td>
                                                    <td>
                                                        20000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Scoring Rate : 200 - Above
                                                    </td>
                                                    <td>
                                                        25000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        6s
                                                    </td>
                                                    <td>
                                                        6000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        4s
                                                    </td>
                                                    <td>
                                                        4000
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="action-4">
                                        <div class="table-responsive col-md-12">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Rule</th>
                                                    <th>Points</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="cwt">
                                                    <td>
                                                        Runs : 201 - Above
                                                    </td>
                                                    <td>
                                                        45000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Runs : 151 - 200
                                                    </td>
                                                    <td>
                                                        35000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Runs : 126 - 150
                                                    </td>
                                                    <td>
                                                        30000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Runs : 101 - 125
                                                    </td>
                                                    <td>
                                                        25000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Runs : 76 - 100
                                                    </td>
                                                    <td>
                                                        20000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Runs : 51 - 75
                                                    </td>
                                                    <td>
                                                        15000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Runs : 1 - 50
                                                    </td>
                                                    <td>
                                                        10000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Wicket Haul : 1 - 2
                                                    </td>
                                                    <td>
                                                        10000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Wicket Haul : 2 - 3
                                                    </td>
                                                    <td>
                                                        15000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Wicket Haul : 4 - 5
                                                    </td>
                                                    <td>
                                                        25000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Wicket Haul : 5 - 6
                                                    </td>
                                                    <td>
                                                        30000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Wicket Haul : 6 - Above
                                                    </td>
                                                    <td>
                                                        35000
                                                    </td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td>
                                                        Not Out
                                                    </td>
                                                    <td>
                                                        5000
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--Game actions outer loop-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection