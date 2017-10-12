
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
                                          <td> <!--
                                              <?php
                                                $text = "N-A";
                                                if (!empty($player['player_match_stats'][0]['text'])) {
                                                    $text = $player['player_match_stats'][0]['text'];
                                                }
                                                echo $text;
                                                ?> --></td>
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






