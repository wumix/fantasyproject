@extends('layouts.app')
{{--{{dd($matches->t)}}--}}
@section('title')
    Scorecards
@stop
@section('content')
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
                        <span class="gt_match_result">{{$match['result']}}</span>
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
                                            <td><?php
                                                $text = "N-A";
                                                if (!empty($player['player_match_stats'][0]['text'])) {
                                                    $text = $player['player_match_stats'][0]['text'];
                                                }
                                                echo $text;
                                                ?></td>
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

@endsection
@section('js')
    <script>
        $('#gt_team_select').change(function () {
            window.location = "{{route('scorecard',['id'=>$match['id'],'tournament_id'=>$tournament_id])}}?team_name=" + $(this).val();
        });
    </script>


@endsection