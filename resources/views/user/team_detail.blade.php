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

            if ($i['match_id'] == $matches['id'])
                return $i;
        });
        $i++;
    }
}
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

        <div class="row" >
            <div class="col-lg-12">

                <h1 class="page-heading">
                    {{$user_team_player_transfer['name']}}
                </h1>
                <div class="row">
                    <h3  class="page-heading">Your Team Score: <span id="team_score"></span></h3>
                    <h3 class="page-heading">Points Remaining:<span id="remaining_score"></span></h3>
                </div>
                <hr class="light full" id="guide">
                <div class="table-responsive">
                    <table class="table table-striped" id="tortable">
                        <thead class="main-taible-head">
                            <tr>
                                <th class="border-r th1" style="min-width: 100px;
                                    ">&nbsp;</th>
                                <th class="border-r" style="min-width: 200px;">Player</th>
                                <th class="border-r" style="min-width: 150px;">Belongs To</th>
                                <th class="border-r" style="min-width: 250px;">Points</th>
                                <th class="th2" colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="selected-player" class="main-taible-body">
                            <?php $teamtotal = 0; ?>
                            @foreach($team_score as $row )
                            <?php
                            $player_transfer_id = $row['id'];

                            $playertotal = 0;
                            $flag = 0;
                            $playertransferedname = "";
                            $playertransferedpic = "";
                            $playertransferedscore = 0;
                            $playerinscore = 0;
                            $x = 0;
                            foreach ($user_team_player_transfer['user_team_player_transfers'] as $transfer) {
                                if ($transfer['pivot']['player_in_id'] == $row['id']) {
                                    $playertransferedpic = $transfer['profile_pic'];
                                    $playertransferedname = $transfer['name'];
                                    $playertransferedscore = $transfer['pivot']['player_out_score'];
                                    $flag = 1;
                                    // $playertotal+=$transfer['pivot']['player_out_score'];
                                    $teamtotal += $transfer['pivot']['player_out_score'];
                                    $teamtotal -= $transfer['pivot']['player_in_score'];
                                    $playerinscore = $transfer['pivot']['player_in_score'];
                                    $x = $transfer['pivot']['player_in_score'];
                                }
                            }
                            ?>
                            @foreach($row['player_game_term_score'] as $termscore)
                            @foreach($termscore['points_devision_tournament'] as $points)
                            <?php
                            if ($points['qty_from'] == $points['qty_to']) {
                                $playertotal += $points['points'] * $termscore['player_term_count'];
                            } else {
                                if (($points['qty_from'] <= $termscore['player_term_count']) && ($points['qty_to'] >= $termscore['player_term_count'])) {
                                    $playertotal += $points['points'];
                                }
                            }
                            $teamtotal += $playertotal;
                            ?>
                            @endforeach
                            @endforeach
                            <tr>
                                <td class="border-r1 text-left" style="min-width: 200px; position: relative;">
                                    <div class="current_player">
                                        <img style="width: 80px;" class="img-thumbnail" src="{{getUploadsPath($row['profile_pic'])}}">
                                    </div>
                                    @if($flag==1)
                                    <div class="transfered_container relative">
                                        <a href="#" data-toggle="tooltip" title="" data-original-title="Transferred">
                                            <img src="{{URL::to('assets-new/img/transferred_arrow.png')}}">
                                        </a>
                                        <div class="absolute transfered_player_img">
                                            <img class="img-thumbnail transfered_player_img" src=" {{getUploadsPath($playertransferedpic)}}">
                                        </div>
                                    </div>
                                    @endif
                                </td>

                                <td class="border-r1 " style="position: relative; min-width: 250px; text-align: center;" >
                                    <span style="position: absolute ; left:50px;text-align: center; " >  {{$row['name']}}</span>
                                    <br>
                                    <span style="position: absolute ;bottom: 23px; left:50px;text-align: center; " > {{$playertransferedname}}</span>
                                </td>
                                <td class="border-r1 " style="position: relative;" style="min-width: 150px;">
                                    @foreach($row['player_actual_teams'] as $playerteam )
                                    {{ $playerteam['name']}}
                                    @endforeach

                                    <br>
                                    <span style="position: absolute ;bottom: 23px; "></span>
                                </td>
                                <td class="border-r1 " style="position:  relative; text-align:center;min-width: 250px;">
                                    <span style="position: absolute;"> {{ $playertotal}}  </span>
                                    <br>
                                    @if($flag==1)
                                    <span style="position: absolute;">
                                        {{$playerinscore}}: <strong>previous score</strong>
                                    </span>

                                    @endif
                                    <span style="position: absolute;bottom: 23px; ">

                                        @if($flag==1)

                                        {{$playertransferedscore}}


                                        @endif

                                    </span>
                                </td>

                                <td id="player_tr-del-111" class="cwt">



                                </td>
                                <td>
                                    @if(!$flag==1)

                                    <a href="{{route('transferplayer', ['team_id'=>$user_team_player_transfer['id'],'player_id'=>$player_transfer_id,'tournament_id'=>$user_team_player_transfer['tournament_id']])}}"
                                       class="btn btn-green">Transfer Player
                                    </a>
                                    @endif

                                </td>

                            </tr>
                            @endforeach

                            <tr>
                                <td> <h3>Total Team Score: {{$teamtotal}}</h3></td>
                            </tr>

                        </tbody></table></div>
            </div>
        </div>
    </div>
    <br><br><br><br><br> <br><br>

</section>
<!-- .....................Login Form Start............................... -->

<!-- .....................Login Form Start............................... -->
@endsection

@section('js')
<script>
    /*  var tour = new Tour({
     steps: [
     {
     element: "#guide",
     title: "Tip",
     content: "Scroll Left and Right"
     }
     ]}); */

    // Initialize the tour
    //tour.init();

    // Start the tour
    //   tour.start();
</script>
<script>

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('#team_score').html('{{$teamtotal}}')
        $('#remaining_score').html('{{getUserTotalScore(\Auth::id())}}');
    });

</script>
@stop

