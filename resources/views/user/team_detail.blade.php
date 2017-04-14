<?php
       // dd($user_team_player_transfer['user_team_player_transfers']);
//dd(user_team_player_transfer);
//dd($team_score);
//first loop on players
//dd($user_team_player_transfer->toArray());
if(empty($user_team_player_transfer->toArray())){
    $user_team_player_transfer=null;
}else{
    $user_team_player_transfer=$user_team_player_transfer->toArray();
    $user_team_player_transfer=$user_team_player_transfer[0];
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
                            <?php $teamtotal = 0;?>
                            @foreach($team_score as $row )
                                    <?php $playertotal = 0;
                                     $playertransferedname="";
                                    $playertransferedpic="";
                                    $playertransferedscore=0;
                                    foreach($user_team_player_transfer['user_team_player_transfers'] as $transfer){
                                        if($transfer['pivot']['player_in_id']==$row['id']){
                                            $playertransferedpic=$transfer['profile_pic'];
                                            $playertransferedname=$transfer['name'];
                                            $playertransferedscore=$transfer['pivot']['player_out_score'];

                                            $playertotal+=$transfer['pivot']['player_out_score'];
                                            $teamtotal-=$transfer['pivot']['player_in_score'];
                                        }
                                    }


                                    ?>
                                    @foreach($row['player_game_term_score'] as $termscore)

                                        @foreach($termscore['points_devision_tournament'] as $points)
                                            <?php
                                            if($points['qty_from']==$points['qty_to']){
                                                //   echo "yes";
                                                //     echo $points['points'] * $termscore['player_term_count'];
                                                $playertotal += $points['points'] * $termscore['player_term_count'];

                                            }
                                            else{
                                                if(($points['qty_from']<=$termscore['player_term_count']) &&($points['qty_to']>=$termscore['player_term_count']))
                                                {
                                                    //  echo $points['qty_from']." ". $termscore['player_term_count']." ".$points['qty_to']."<br>";


                                                    $playertotal += $points['points'];
                                                }
                                            }
                                            ?>


                                        @endforeach

                                    @endforeach
                                <div class="row">
                                    <div class="col-md-8"><img style="width: 80px;float: left;margin-right: 24px;" class="img-thumbnail"
                                             src=" {{getUploadsPath($row['profile_pic'])}}">
                                        <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <img style="width: 80px;float: left;margin-right: 24px;" class="img-thumbnail"
                                                               src=" {{getUploadsPath($playertransferedpic)}}">
                                    </div>



                                    </div>
                                    <div class="col-md-2">{{$row['name']}}

                                      {{$playertransferedname}}


                                    </div>
                                    <?php $teamtotal += $playertotal;?>
                                    <div class="col-md-2">  {{$playertotal}}</div>

                                </div>
                               <hr>
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
