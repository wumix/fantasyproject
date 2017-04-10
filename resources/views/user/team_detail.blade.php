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
                        <table class="table table-striped" id="tortable">
                     <?php $teamtotal=0;?>
                        @foreach($team_score as $row )
                              <tr>
                                  <td><img style="width: 80px;float: left;margin-right: 24px;"  class="img-thumbnail" src=" {{getUploadsPath($row['profile_pic'])}}"></td>
                                  <td>{{$row['name']}}</td>


                                <?php $playertotal=0;?>
                            @foreach($row['player_game_term_score'] as $termscore)

                                @foreach($termscore['points_devision_tournament'] as $points)

                                 <?php   $playertotal+=$points['points']*$termscore['player_term_count'];?>


                                @endforeach

                            @endforeach

                                <?php $teamtotal+=$playertotal;?>
                             <td>  {{$playertotal}}</td>
                         </tr>

                        @endforeach



                         </table>
                         <h3>Total Team Score: {{$teamtotal}}</h3>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- .....................Login Form Start............................... -->
@endsection
