<?php
// dd($team_score);
//dd($team_score);
//first loop on players
$z = [];
foreach ($team_score as $teamplayers) {
    $i = 0;
    foreach ($teamplayers['player_matches'] as $matches) {

        $z[$matches['name']] = array_filter($teamplayers['player_game_term_score'], function ($i) use ($matches) {

            if ($i['match_id'] == $matches['id']) return $i;


        });
        $i++;

    }
}
// dd($z);

?>
@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        Your Team Performance
                    </h1>
                    <hr class="light full">
                    <div class="page-content col-md-12">

                        @foreach($team_score as $team_player)
                            <h2>
                                {{$team_player['name'] }}</h2>






                            @foreach($z as $key=>$player_game_term_score)
                                <h3>{{$key}}</h3>

                                <table class="table table-striped" id="tortable">
                                    <?php  $matchpoints = 0 ?>
                                    @foreach($player_game_term_score as $row)

                                        <tr>
                                            <td colspan="3" style="background:green; color:#FFFFFF"> {{$row['game_terms']['name']}}</td>
                                        </tr>
                                        <tr>

                                            <td>To</td>
                                            <td> From</td>
                                            <td> points</td>
                                        </tr>

                                        <?php  $totalpoints = 0 ?>
                                        @foreach($row['points_devision_tournament'] as $scores )
                                            <tr>

                                                <td>{{$scores['qty_to']}}</td>
                                                <td>{{$scores['qty_from']}}</td>
                                                <td>{{$scores['points']}}</td>
                                                <?php $totalpoints += $scores['points'] ?>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>{{$totalpoints}}</td>
                                            <?php $matchpoints += $totalpoints;?>

                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2">Total Match points</td>

                                        <td>{{$matchpoints}}</td>
                                    </tr>
                                </table>
                            @endforeach



                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- .....................Login Form Start............................... -->
@endsection
