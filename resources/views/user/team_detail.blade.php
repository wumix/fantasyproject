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
                    <hr class="light full">
                    <div class="page-content no-padding col-md-12">
                        <div class="row">
                            <div class="col-md-12" style=" height:150px;display: flex;">

                                <div class="col-md-4">
                                    <div class="current_player">
                                        <img style="width: 80px;" class="img-thumbnail" src=" http://gamithonfantasy.com/uploads/player_pictures/2017/04/FjG1sOTHJCivHdOwEVf9Zi2lU3TYTWJiEI5w8Hih.png">
                                    </div>

                                </div>

                                <div class="col-md-2 relative">Lasith malinga
                                    <div class="absolute" style="bottom: 0;">

                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    Mumbai Indians
                                </div>

                                <div class="col-md-2">

                                    <label>-20</label>
                                </div>
                                <div class="col-md-2">

                                    <a href="http://gamithonfantasy.com/tournaments/transfer/33/14/1" class="btn btn-green">Transfer Player
                                    </a>
                                </div>
                            </div>
                            <div class="clear clearfix"></div>
                        </div>
                        <div class="clear clearfix"></div>
                        <hr class="thickBorder">
                        <div class="row">
                            <div class="col-md-12" style=" height:150px;display: flex;">

                                <div class="col-md-4">
                                    <div class="current_player">
                                        <img style="width: 80px;" class="img-thumbnail" src=" http://gamithonfantasy.com/uploads/player_pictures/2017/04/EsozAxNAlLx8CRdxD8Xs6vIthu77n5k5tC6nSYRW.png">
                                    </div>
                                    <div class="transfered_container relative">
                                        <a href="#" data-toggle="tooltip" title="" data-original-title="Transferred">
                                            <img src="http://gamithonfantasy.com/assets-new/img/transferred_arrow.png">
                                        </a>
                                        <div class="absolute transfered_player_img">
                                            <img class="img-thumbnail transfered_player_img" src=" http://gamithonfantasy.com/uploads/player_pictures/2017/04/zDiNYe8P7kZd9nCEElPtAFrTUAoXA5nH2eewlce1.png">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-2 relative">Hardik Pandya
                                    <div class="absolute" style="bottom: 0;">
                                        Amit Mishra
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    Mumbai Indians
                                </div>

                                <div class="col-md-2">

                                    <label>338</label>
                                    <br> previous score: 289
                                    <div class="absolute" style="bottom: 0;">

                                        35
                                    </div>
                                </div>
                                <div class="col-md-2">

                                    <a href="http://gamithonfantasy.com/tournaments/transfer/33/17/1" class="btn btn-green">Transfer Player
                                    </a>
                                </div>
                            </div>
                            <div class="clear clearfix"></div>
                        </div>
                        <div class="clear clearfix"></div>
                        <hr class="thickBorder">
                        <div class="row">
                            <div class="col-md-12" style=" height:150px;display: flex;">

                                <div class="col-md-4">
                                    <div class="current_player">
                                        <img style="width: 80px;" class="img-thumbnail" src=" http://gamithonfantasy.com/uploads/player_pictures/2017/04/4GB3DXNc0sPlRb2TWHKjQ9l6ggS3ZedbkUgA7tMy.png">
                                    </div>

                                </div>

                                <div class="col-md-2 relative">Kieron Pollard
                                    <div class="absolute" style="bottom: 0;">

                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    Mumbai Indians
                                </div>

                                <div class="col-md-2">

                                    <label>392</label>
                                </div>
                                <div class="col-md-2">

                                    <a href="http://gamithonfantasy.com/tournaments/transfer/33/22/1" class="btn btn-green">Transfer Player
                                    </a>
                                </div>
                            </div>
                            <div class="clear clearfix"></div>
                        </div>
                        <div class="clear clearfix"></div>
                        <hr class="thickBorder">
                        <div class="row">
                            <div class="col-md-12" style=" height:150px;display: flex;">

                                <div class="col-md-4">
                                    <div class="current_player">
                                        <img style="width: 80px;" class="img-thumbnail" src=" http://gamithonfantasy.com/uploads/player_pictures/2017/04/qTSbo2AoO9PFEiwAAYOqevdhdVRDiwg2LBXbbnxF.png">
                                    </div>

                                </div>

                                <div class="col-md-2 relative">Gautam Gambhir
                                    <div class="absolute" style="bottom: 0;">

                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    Kolkata Knight Riders
                                </div>

                                <div class="col-md-2">

                                    <label>339</label>
                                </div>
                                <div class="col-md-2">

                                    <a href="http://gamithonfantasy.com/tournaments/transfer/33/62/1" class="btn btn-green">Transfer Player
                                    </a>
                                </div>
                            </div>
                            <div class="clear clearfix"></div>
                        </div>
                        <div class="clear clearfix"></div>
                        <hr class="thickBorder">
                        <div class="row">
                            <div class="col-md-12" style=" height:150px;display: flex;">

                                <div class="col-md-4">
                                    <div class="current_player">
                                        <img style="width: 80px;" class="img-thumbnail" src=" http://gamithonfantasy.com/uploads/player_pictures/2017/04/3E87Hvn49OH1LJKux1Jz7WOiHBKszNzLuF10BF9Z.png">
                                    </div>

                                </div>

                                <div class="col-md-2 relative">Brendon Mccullum
                                    <div class="absolute" style="bottom: 0;">

                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    Gujarat Lions
                                </div>

                                <div class="col-md-2">

                                    <label>488</label>
                                </div>
                                <div class="col-md-2">

                                    <a href="http://gamithonfantasy.com/tournaments/transfer/33/99/1" class="btn btn-green">Transfer Player
                                    </a>
                                </div>
                            </div>
                            <div class="clear clearfix"></div>
                        </div>
                        <div class="clear clearfix"></div>
                        <hr class="thickBorder">
                        <div class="row">
                            <div class="col-md-12" style=" height:150px;display: flex;">

                                <div class="col-md-4">
                                    <div class="current_player">
                                        <img style="width: 80px;" class="img-thumbnail" src=" http://gamithonfantasy.com/uploads/player_pictures/2017/04/QdzCJ5RAGgInnbijgIarREDEGjc2ipG3F8Zp9raM.png">
                                    </div>

                                </div>

                                <div class="col-md-2 relative">Sunil Narine
                                    <div class="absolute" style="bottom: 0;">

                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    Kolkata Knight Riders
                                </div>

                                <div class="col-md-2">

                                    <label>202</label>
                                </div>
                                <div class="col-md-2">

                                    <a href="http://gamithonfantasy.com/tournaments/transfer/33/103/1" class="btn btn-green">Transfer Player
                                    </a>
                                </div>
                            </div>
                            <div class="clear clearfix"></div>
                        </div>
                        <div class="clear clearfix"></div>
                        <hr class="thickBorder">
                        <div class="row">
                            <div class="col-md-12" style=" height:150px;display: flex;">

                                <div class="col-md-4">
                                    <div class="current_player">
                                        <img style="width: 80px;" class="img-thumbnail" src=" http://gamithonfantasy.com/uploads/player_pictures/2017/04/gvg2ha8N9tVf7hRbKvLED2gmSdMPpY2xKvDHbDxb.png">
                                    </div>
                                    <div class="transfered_container relative">
                                        <a href="#" data-toggle="tooltip" title="" data-original-title="Transferred">
                                            <img src="http://gamithonfantasy.com/assets-new/img/transferred_arrow.png">
                                        </a>
                                        <div class="absolute transfered_player_img">
                                            <img class="img-thumbnail transfered_player_img" src=" http://gamithonfantasy.com/uploads/player_pictures/2017/04/9rNAm5DdntE0h4brd7QHqqIGLpvSYG8dSXwiSCrT.png">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-2 relative">Samuel Badree
                                    <div class="absolute" style="bottom: 0;">
                                        Umesh Yadav
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    Royal Challengers Bangalore
                                </div>

                                <div class="col-md-2">

                                    <label>45</label>
                                    <br> previous score: 45
                                    <div class="absolute" style="bottom: 0;">

                                        0
                                    </div>
                                </div>
                                <div class="col-md-2">

                                    <a href="http://gamithonfantasy.com/tournaments/transfer/33/111/1" class="btn btn-green">Transfer Player
                                    </a>
                                </div>
                            </div>
                            <div class="clear clearfix"></div>
                        </div>
                        <div class="clear clearfix"></div>
                        <hr class="thickBorder">
                        <div class="row">
                            <div class="col-md-12" style=" height:150px;display: flex;">

                                <div class="col-md-4">
                                    <div class="current_player">
                                        <img style="width: 80px;" class="img-thumbnail" src=" http://gamithonfantasy.com/uploads/player_pictures/2017/04/xZ1n9hOfMjmBpf64S1016Ulk8HWM6bNgSWSxlFrw.png">
                                    </div>

                                </div>

                                <div class="col-md-2 relative">Robin Uthappa
                                    <div class="absolute" style="bottom: 0;">

                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    Kolkata Knight Riders
                                </div>

                                <div class="col-md-2">

                                    <label>274</label>
                                </div>
                                <div class="col-md-2">

                                    <a href="http://gamithonfantasy.com/tournaments/transfer/33/130/1" class="btn btn-green">Transfer Player
                                    </a>
                                </div>
                            </div>
                            <div class="clear clearfix"></div>
                        </div>
                        <div class="clear clearfix"></div>
                        <hr class="thickBorder">
                        <div class="row">
                            <div class="col-md-12" style=" height:150px;display: flex;">

                                <div class="col-md-4">
                                    <div class="current_player">
                                        <img style="width: 80px;" class="img-thumbnail" src=" http://gamithonfantasy.com/uploads/player_pictures/2017/04/FuQR93wsyK7fdn2PyjyIi0U4KTmtwtYDI03aSnej.png">
                                    </div>
                                    <div class="transfered_container relative">
                                        <a href="#" data-toggle="tooltip" title="" data-original-title="Transferred">
                                            <img src="http://gamithonfantasy.com/assets-new/img/transferred_arrow.png">
                                        </a>
                                        <div class="absolute transfered_player_img">
                                            <img class="img-thumbnail transfered_player_img" src=" http://gamithonfantasy.com/uploads/player_pictures/2017/04/H12Go1noY8pcpq2pRgrQhY5vkYbKcT6h0MDAjecR.png">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-2 relative">Bhuvneshwar Kumar
                                    <div class="absolute" style="bottom: 0;">
                                        Nathan Coulter-Nile
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    Sunrisers Hyderabad
                                </div>

                                <div class="col-md-2">

                                    <label>114</label>
                                    <br> previous score: 114
                                    <div class="absolute" style="bottom: 0;">

                                        0
                                    </div>
                                </div>
                                <div class="col-md-2">

                                    <a href="http://gamithonfantasy.com/tournaments/transfer/33/143/1" class="btn btn-green">Transfer Player
                                    </a>
                                </div>
                            </div>
                            <div class="clear clearfix"></div>
                        </div>
                        <div class="clear clearfix"></div>
                        <hr class="thickBorder">
                        <div class="row">
                            <div class="col-md-12" style=" height:150px;display: flex;">

                                <div class="col-md-4">
                                    <div class="current_player">
                                        <img style="width: 80px;" class="img-thumbnail" src=" http://gamithonfantasy.com/uploads/player_pictures/2017/04/pGRnfVziLkXDeHHKmBA41VvHZ1X6jX67XE7Uq4pO.jpeg">
                                    </div>
                                    <div class="transfered_container relative">
                                        <a href="#" data-toggle="tooltip" title="" data-original-title="Transferred">
                                            <img src="http://gamithonfantasy.com/assets-new/img/transferred_arrow.png">
                                        </a>
                                        <div class="absolute transfered_player_img">
                                            <img class="img-thumbnail transfered_player_img" src=" http://gamithonfantasy.com/uploads/player_pictures/2017/04/qzevA0C1gw2B0UZXnzo1L3j9PQVIV54KfK13MeSd.jpeg">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-2 relative">Manan Vohra
                                    <div class="absolute" style="bottom: 0;">
                                        Eoin Morgan
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    Kings XI Punjab
                                </div>

                                <div class="col-md-2">

                                    <label>406</label>
                                    <br> previous score: 205
                                    <div class="absolute" style="bottom: 0;">

                                        113
                                    </div>
                                </div>
                                <div class="col-md-2">

                                    <a href="http://gamithonfantasy.com/tournaments/transfer/33/173/1" class="btn btn-green">Transfer Player
                                    </a>
                                </div>
                            </div>
                            <div class="clear clearfix"></div>
                        </div>
                        <div class="clear clearfix"></div>
                        <hr class="thickBorder">
                        <div class="row">
                            <div class="col-md-12" style=" height:150px;display: flex;">

                                <div class="col-md-4">
                                    <div class="current_player">
                                        <img style="width: 80px;" class="img-thumbnail" src=" http://gamithonfantasy.com/uploads/profile_pics/2017/04/oFKLl6j1eMvskAHok9RLHUjMqJTpbsglVDKIQzFp.png">
                                    </div>

                                </div>

                                <div class="col-md-2 relative">Nitish Rana
                                    <div class="absolute" style="bottom: 0;">

                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    Mumbai Indians
                                </div>

                                <div class="col-md-2">

                                    <label>513</label>
                                </div>
                                <div class="col-md-2">

                                    <a href="http://gamithonfantasy.com/tournaments/transfer/33/197/1" class="btn btn-green">Transfer Player
                                    </a>
                                </div>
                            </div>
                            <div class="clear clearfix"></div>
                        </div>
                        <div class="clear clearfix"></div>
                        <hr class="thickBorder">
                        <h3>Total Team Score: 2586</h3>
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

