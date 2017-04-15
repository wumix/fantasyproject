<?php
// dd($user_team_player_transfer['user_team_player_transfers']);
//dd(user_team_player_transfer);
//dd($team_score);
//first loop on players
//dd($user_team_player_transfer->toArray());
if (empty($user_team_player_transfer->toArray())) {
    $user_team_player_transfer = null;
} else {
    $user_team_player_transfer = $user_team_player_transfer->toArray();
    $user_team_player_transfer = $user_team_player_transfer[0];
}
//dd($user_team_player_transfer);
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
    <style>
        .transfered_player_img {
            width: 50px;
        }

        .transfered_container {
            float: left;
        }

        .transfered_player_img {
            left: 50%;
        }

        .current_player {
            float: left;
        }
        .thinkBorder{
            border-width: 1px;
        }
    </style>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        Your Team Performance
                    </h1>
                    <hr class="light full">
                    <div class="page-content no-padding col-md-12">
                        <?php $teamtotal = 0;?>
                        @foreach($team_score as $row )
                            <?php
                                $playertotal = 0;
                            $flag=0;
                            $playertransferedname = "";
                            $playertransferedpic = "";
                            $playertransferedscore = 0;
                            $playerinscore = 0;
                            foreach ($user_team_player_transfer['user_team_player_transfers'] as $transfer) {
                                if ($transfer['pivot']['player_in_id'] == $row['id']) {
                                    $playertransferedpic = $transfer['profile_pic'];
                                    $playertransferedname = $transfer['name'];
                                    $playertransferedscore = $transfer['pivot']['player_out_score'];
                                    $flag=1;
                                    // $playertotal+=$transfer['pivot']['player_out_score'];
                                    $teamtotal += $transfer['pivot']['player_out_score'];
                                    $teamtotal -= $transfer['pivot']['player_in_score'];
                                    $playerinscore -= $transfer['pivot']['player_in_score'];

                                }
                            }
                            ?>
                            @foreach($row['player_game_term_score'] as $termscore)
                                @foreach($termscore['points_devision_tournament'] as $points)
                                    <?php
                                    if ($points['qty_from'] == $points['qty_to']) {
                                        //   echo "yes";
                                        //     echo $points['points'] * $termscore['player_term_count'];
                                        $playertotal += $points['points'] * $termscore['player_term_count'];

                                    } else {
                                        if (($points['qty_from'] <= $termscore['player_term_count']) && ($points['qty_to'] >= $termscore['player_term_count'])) {
                                            //  echo $points['qty_from']." ". $termscore['player_term_count']." ".$points['qty_to']."<br>";


                                            $playertotal += $points['points'];
                                        }
                                    }
                                    ?>
                                @endforeach
                            @endforeach
                            <div class="row">
                                <div class="col-md-12" style="display: flex;">
                                    <div class="col-md-8">
                                        <div class="current_player">
                                            <img style="width: 80px;"
                                                 class="img-thumbnail"
                                                 src=" {{getUploadsPath($row['profile_pic'])}}"/>
                                        </div>
                                  @if($flag==1)
                                        <div class="transfered_container relative">
                                            <a href="#" data-toggle="tooltip" title="Transferred">
                                                <img src="{{URL::to('assets-new/img/transferred_arrow.png')}}"/>
                                            </a>
                                            <div class="absolute transfered_player_img">
                                                <img class="img-thumbnail transfered_player_img"
                                                     src=" {{getUploadsPath($playertransferedpic)}}">
                                            </div>
                                        </div>
                                      @endif

                                    </div>
                                    <div class="col-md-2 relative">{{$row['name']}}
                                        <div class="absolute" style="bottom: 0;">
                                            {{$playertransferedname}}
                                        </div>
                                    </div>
                                    <?php $teamtotal += $playertotal;?>
                                    <div class="col-md-2">
                                        {{$playertotal}}
                                        @if($flag==1)
                                        <div class="absolute" style="bottom: 0;">
                                            {{$playertransferedscore}}
                                        </div>
                                            @endif
                                    </div>
                                </div>
                                <div class="clear clearfix"></div>
                            </div>
                            <div class="clear clearfix"></div>
                            <hr class="thinkBorder">
                        @endforeach
                        <h3>Total Team Score: {{$teamtotal}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- .....................Login Form Start............................... -->
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop

