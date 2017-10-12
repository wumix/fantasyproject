@extends('layouts.app')
@section('title')
    Player transfer
@stop
@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        {{$team_name}}
                    </h1>
                    <hr class="light full">
                    <div class="page-content">
                        <div class="row">
                            <div class="col-md-12">

                                <input id="team_id" type="hidden" value="{{$team_id}}">
                                <h3 style="color: blue;">{{$tournament_detail['name']}}</h3>
                            </div>
                            <div class="col-md-12" style="color: orangered; font-family: Raleway">
                                <h3>Your Points: <span id="your_points">{{getUserTotalScore(Auth::id(),$tournament_detail['id'])}}</span></h3>
                            </div>

                        </div>
                        <div class="row mt26">
                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="tortable">
                                        <thead class="main-taible-head">
                                        <tr>
                                            <th class="border-r th1" style="min-width: 300px;
">Player
                                            </th>
                                            <th class="border-r">Roles</th>
                                            <th class="border-r">Price</th>
                                            <th class="th2" colspan="2">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody id="selected-player" class="main-taible-body">

                                        <tr>
                                            <td class="border-r1 text-left" style="min-width: 300px;
"><img class="img-thumbnail"
       src="{{getUploadsPath($player_info['profile_pic'])}}"
       style="width: 80px;float: left;margin-right: 24px;">
                                                <span class="selected-player-name">   {{$player_info['name']}} </span>
                                            </td>

                                            <td class="border-r1">
                                                {{$player_info['player_roles'][0]['name']}}
                                            </td>
                                            <td class="border-r1">
                                                {{$player_info['player_tournaments'][0]['pivot']['player_price']}}
                                            </td>


                                            <td id="player_tr-del-" class="cwt">


                                            </td>
                                            {{--<td>--}}

                                            {{--<a href="{{route('transferplayer', ['team_id'=>$team_id,'player_id'=>$row['id'],'tournament_id'=>$val['id']])}}"--}}
                                            {{--class="btn btn-green">Transfer Player--}}
                                            {{--</a>--}}

                                            {{--</td>--}}

                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!--Choose player-->
                        <div class="row mt26">
                            <div class="col-md-9">
                                <h4>
                                    Transfer with:
                                </h4>

                                <div class="panel with-nav-tabs panel">
                                    <div class="panel-heading">
                                        <ul class="nav nav-tabs">

                                            @foreach($roles as $key => $role)

                                                <li id="tbbox-{{$key}}" class="{!! ($key == 0) ? 'active':'' !!}">
                                                    <a id="tabt-{{$key}}" href="#tab{{$role['id']}}default"
                                                       data-toggle="tab">{{$role['name']}}</a>
                                                </li>

                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            {{--first div--}}
                                            @foreach($roles as $key=>$role)
                                                <div class="tab-pane fade {!! ($key == 0) ? 'in active':'' !!}"
                                                     id="tab{{$role['id']}}default">
                                                    <div class="table-responsive">
                                                        <table class="table " id="tortable">
                                                            <thead class="main-taible-head1">
                                                            <tr>

                                                                <th class=" th1" style="min-width: 300px;">Player</th>
                                                                <th>
                                                                    Team
                                                                </th>
                                                                <th class="text-center">Price</th>
                                                                <th class="text-center">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody class="main-taible-body">

                                                            @foreach($role['players'] as $player)
                                                                <?php if (empty($player['player_tournaments'])) continue;   ?>
                                                                <tr id="player_tr-{{$player['id']}}" class="cwt">

                                                                    <td class=" th11">
                                                                        <a class="colorbox"
                                                                           href="{{route('showPlayerStats', ['player_id'=>$player['id']])}}">
                                                                            <img id="myteamtimg" class="img-circle"
                                                                                 style="width: 80px;float: left;margin-right: 24px;"
                                                                                 src="{{getUploadsPath($player['profile_pic'])}}">
                                                                        </a>


                                                                        {{$player['name']}}
                                                                    </td>
                                                                    <td class="text-left">
                                                                        <?php
                                                                        if (!empty($player['player_actual_teams'])) {
                                                                            echo $player['player_actual_teams'][0]['name'];
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class=" point"><p
                                                                                class="myteamtt">
                                                                            <?php
                                                                            $playerids = 0;
                                                                            $playerThisTournamnetPrice = 0;
                                                                            // dd($player);
                                                                            if (!empty($player['player_tournaments'][0]['pivot']['player_price'])) {
                                                                                $playerThisTournamnetPrice = $player['player_tournaments'][0]['pivot']['player_price'];
                                                                            }

                                                                            //                                                            if (!empty($player['player_tournaments'][0]['id'])) {
                                                                            //                                                                $playerids =$player['player_tournaments'][0]['id'];
                                                                            //                                                            }
                                                                            ?>
                                                                            {{$playerThisTournamnetPrice}}

                                                                        </p>
                                                                    </td>

                                                                    <td>
                                                                        <a onclick="return confirm('Are you sure you want to transfer');"
                                                                           style="text-transform: uppercase"
                                                                           id="btn-player-{{$player['id']}}"
                                                                           href="javascript:addplayertoteam('{{$role['name']}}','{{$role['id']}}','{{$player['id']}}','{{$player['player_tournaments'][0]['id']}}','{{$playerThisTournamnetPrice}}')"
                                                                           class="btn btn-md bttor1">
                                                                            TRANSFER WITH {{$player_info['name']}}
                                                                        </a>
                                                                    </td>


                                                                </tr>
                                                            @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="point-summery col-md-3" id="point-summery">
                                <h4 class="small-sec-heading">
                                    Available points <span class="pull-right"
                                                           id="your_points1">{{getUserTotalScore(Auth::id(),$tournament_detail['id'])}}</span>
                                </h4>
                                <hr class="light"/>
                                <h5 style="color: #92B713;">
                                    Transfer Rules
                                </h5>
                                <ul class="players-cal-summery">
                                    <li>
                                        You can Transfer a palyer with in available points OR
                                        {{--<span class="pull-right">--}}
                                           {{--<span id="remaining-batsman">{{getPlayerNoInTeam(\Auth::id(),$team_id,5)}}</span>/4--}}
                                        {{--</span>--}}
                                    </li>
                                    <li>
                                        You can swap a higher priced player with lower priced player.
                                        {{--Bowler--}}
                                        {{--<span class="pull-right">--}}
                                            {{--<span id="remaining-bowler">{{getPlayerNoInTeam(\Auth::id(),$team_id,6)}}</span>/4--}}
                                        {{--</span>--}}
                                    </li>



                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class='error' style='display:none'></div>

@endsection
@section('addteamjs')

    <script>
        function addplayertoteam(rolename, roleid, playerin, tournamentid, player_price) {

            var arr_player_id = [];
            arr_player_id.push(playerin);


            $.ajax({
                type: 'POST',
                url: '{{route('transferPlayerAjax')}}',
                data: {
                    tournament_id: tournamentid,
                    player_in_id: arr_player_id[0],
                    player_out_id:{{$player_info['id']}},
                    role_id: roleid,
                    role_name: rolename,
                    player_out_price:{{$player_info['player_tournaments'][0]['pivot']['player_price']}},
                    team_id:{{$team_id}}, _token: '{{csrf_token()}}'
                },
                success: function (data) {
                    if (data.success == true) {
                        $.toast({
                            heading: '&nbsp;',
                            text: data.msg,
                            icon: 'success',
                            loader: true, // Change it to false to disable loader
                            position: 'top-right',
                            showHideTransition: 'slide',
                            hideAfter: 10000,
                            allowToastClose: true,
                            loaderBg: '#92B713'  // To change the background
                        });
                        setTimeout(function () {
                            var url = '{{route("teamdetail", ['team_id'=>'ttid']) }}';
                            url = url.replace('ttid', data.team_id);
                            window.location.href = url;
                        }, 3000);


                    } else {

                        $.toast({
                            heading: '&nbsp;',
                            text: data.msg,
                            icon: 'error',
                            loader: true, // Change it to false to disable loader
                            position: 'top-right',
                            showHideTransition: 'slide',
                            hideAfter: 10000,
                            allowToastClose: true,
                            loaderBg: '#FF0000'  // To change the background
                        });


                    }

                }
            });
        }
    </script>

@endsection
@section('js')
    <script>

        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();

        });

    </script>
@stop