
{{--{{dd($player)}}--}}
        <!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

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
{!! Html::style('js/colorbox-master/example1/colorbox.css') !!}
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
    {!! Html::style('assets-new/css/fixtures.css') !!}


    {!! Html::style('assets-new/vendor/basic-table/basictable.css') !!}
    <style>
        .how_play_sec {
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow: 0px 0px 27px rgba(0, 0, 0, 0.21);
            padding: 50px 36px;
            margin: 25px 0;
        }

        .scorin_bord_sec {
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow: 0px 0px 27px rgba(0, 0, 0, 0.21);
            padding: 50px 36px 0 36px;
            margin-bottom: 10px;
        }

        .sign_text {
            font-size: 14px;
            color: #333333;
        }

        .sign_text span {
            color: #92b713;
        }

        .sign_up_imp {
            width: 100%;
            display: inline-block;
            text-align: center;
            padding: 15px 0px 55px 0;
        }

        ul {
            padding: 0;
        }

        li {
            list-style: none;
        }

        @media all and (min-width: 100px) and (max-width: 768px) {
            .sign_up_imp img {
                width: 377px;
            }

            .scorin_bord_sec p {
                text-align: justify;
            }
        }

        @media all and (min-width: 100px) and (max-width: 480px) {
            .sign_up_imp img {
                width: 251px;
            }

            .scorin_bord_sec p {
                text-align: justify;
            }
        }

        .gt_match_details {
            font-size: 19px;
            color: #52534f;
            margin-bottom: 30px;
        }

        .gt_match_details .gt_teams {
            color: #f6980e;
            text-transform: uppercase;
        }

        .gt_match_details .gt_match_result {
            color: #757474;
            font-size: 14px;
            font-style: italic;
            display: block;
            font-family: 'Open Sans', Sans-Serif;
        }

        .grean_bg_row {
            background: #92b713;
            border: none !important;
        }

        .grey_bg_row {
            background: #e8e8e8;
            border: none !important;
        }

        .gt_team_select {
            font-family: 'Open Sans', Sans-Serif;
            font-style: italic;
            font-weight: 400;
            font-size: 16px;
        }

        .gt_team_select select {
            margin-left: 15px;
        }

        .grean_bg_row th {
            padding: 10px !important;
            color: #fff;
            vertical-align: middle !important;
            font-size: 19px;
        }

        .grey_bg_row th {
            padding: 10px !important;
            font-size: 14px;
            font-weight: 300;
            font-style: italic;
            color: #575454;
        }

        .gt_scorecard_wrapper table tr th:nth-child(1),
        .gt_scorecard_wrapper table tr td:nth-child(1) {
            padding-left: 15px !important;
        }

        .gt_scorecard_wrapper table thead tr:nth-child(2) th,
        .gt_scorecard_wrapper table tbody tr td {
            font-family: 'Open Sans', Sans-Serif;

        }

        .gt_scorecard_wrapper table tbody tr td {
            vertical-align: bottom;
            height: 65px;
        }

        .gt_scorecard_wrapper table tbody tr td:nth-child(1) {
            width: 200px;
            color: #92b713;
            font-size: 16px;
        }

        .gt_scorecard_wrapper table tbody tr td:nth-child(2) {
            width: 60px;
        }

        .gt_scorecard_wrapper table tbody tr td:nth-child(3) {
            width: 200px;
            text-align: center;
        }

        .gt_scorecard_wrapper table thead tr:nth-child(2) th:nth-child(4),
        .gt_scorecard_wrapper table thead tr:nth-child(2) th:nth-child(5),
        .gt_scorecard_wrapper table thead tr:nth-child(2) th:nth-child(6),
        .gt_scorecard_wrapper table thead tr:nth-child(2) th:nth-child(7),
        .gt_scorecard_wrapper table thead tr:nth-child(2) th:nth-child(8) {
            width: 60px;
            text-align: center;
        }

        .gt_scorecard_wrapper table tbody tr td:nth-child(4),
        .gt_scorecard_wrapper table tbody tr td:nth-child(5),
        .gt_scorecard_wrapper table tbody tr td:nth-child(6),
        .gt_scorecard_wrapper table tbody tr td:nth-child(7),
        .gt_scorecard_wrapper table tbody tr td:nth-child(8) {
            width: 60px;
            text-align: center;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row" style="min-height: 500px;">
            <div class="col-md-12">
                <h1 class="page-heading">
                    Score Card
                </h1>
                <hr class="light full">
            </div>
            <div class="how_play_sec">
                <div class="col-md-12 no-padding">


                    <div class="gt_match_details">
                        <a href="#" class="gt_teams">{{$match['team_one']}}</a> vs
                        <a href="#" class="gt_teams">{{$match['team_two']}}</a>
                        <?php
//                        if (empty($match['result'])) {
//                            $match['result'] = "";
//                        }
                        ?>
                      <!--  <span class="gt_match_result">{{$match['result']}}</span>-->
                    </div>

                    <div class="table-responsive gt_scorecard_wrapper">
                        <!--<table class="table table-striped">-->

                        @if(!empty($match['match_players']))
                            <table class="table">
                                <thead>
                                <tr class="grean_bg_row">
                                    <th>Score Card</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th colspan="2">
                                        <div class="gt_team_select">
                                            Select Team:
                                            <select id="gt_team_select" class="form-control"
                                                    style="width: 50%; display: inline-block;">
                                                <option
                                                        @if($team_name==$match['team_one'])
                                                        selected
                                                        @endif
                                                        value="{{$match['team_one']}}">{{$match['team_one']}}</option>
                                                <option @if($team_name==$match['team_two'])
                                                        selected
                                                        @endif value="{{$match['team_two']}}">{{$match['team_two']}}</option>
                                            </select>
                                        </div>
                                    </th>
                                </tr>
                                <tr class="grey_bg_row">
                                    <th>PLAYERS</th>
                                    <th></th>


                                    <th></th>
                                    <th>R</th>
                                    <th>6s</th>
                                    <th>4s</th>
                                    <th>SR</th>
                                    <th>ECON</th>

                                    <th>W</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($match['match_players'] as $player)
                                    @if(strtoupper($player['player_actual_teams'][0]['name'])==$team_name)
                                        <tr>

                                            <td>{{$player['name']}}</td>


                                            <td>
                                                @if($player['player_roles'][0]['pivot']['game_role_id']==5)
                                                    <img src="{{URL::to('/img/batsman-logo.png')}}" alt="">
                                                @endif
                                                @if($player['player_roles'][0]['pivot']['game_role_id']==6)
                                                    <img src="{{URL::to('/img/bowler-logo.png')}}" alt="">
                                                @endif
                                                @if($player['player_roles'][0]['pivot']['game_role_id']==7)
                                                    <img src="{{URL::to('/img/all-rounder-logo.png')}}" alt="">
                                                @endif
                                                @if($player['player_roles'][0]['pivot']['game_role_id']==8)
                                                    <img src="{{URL::to('/img/batsman-logo.png')}}" alt="">
                                                @endif
                                            </td>
                                          <!--  <td><?php
                                                $text = "N-A";
                                                if (!empty($player['player_match_stats'][0]['text'])) {
                                                    $text = $player['player_match_stats'][0]['text'];
                                                }
                                                echo $text;
                                                ?></td> -->
                                            <?php $temp = ['Runs' => '-', '6s' => '-', '4s' => '-', 'SR' => '-', 'Econ' => '-',
                                                'W' => '-'];

                                            ?>



                                            @foreach($temp as $key=>$terms)

                                                @if($t=term_in_array($key,$player['player_game_term_score']))

                                                    <td>{{$t}}</td>
                                                @else
                                                    <td>-</td>
                                                @endif

                                            @endforeach
                                            <td></td>
                                        </tr>
                                    @endif



                                @endforeach

                                </tbody>
                            </table>
                        @else
                            No Records
                        @endif
                    </div>


                </div>

            </div>

        </div>
    </div>
    <script src="http://gamithonfantasy.com/assets-new/vendor/jquery/jquery.min.js"></script>
    <script>
        $('#gt_team_select').change(function () {
            window.location = "{{route('scorecardpopup',['id'=>$match['id'],'tournament_id'=>$tournament_id])}}?team_name=" + $(this).val();
        });
    </script>
</body>
</html>






