@php


//dd($roles);
//dd($player_info);

        @endphp
@extends('layouts.app')

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
                                <h3>Your Points: <span id="your_points">{{getUserTotalScore(Auth::id())}}</span></h3>
                            </div>

                        </div>
                        <div class="row mt26">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="tortable">
                                        <thead class="main-taible-head">
                                        <tr>
                                            <th class="border-r th1" style="min-width: 300px;
">PLAYERS</th>
                                            <th class="border-r">ROLES</th>
                                            <th class="border-r">POINTS</th>
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

                        <div class="col-md-12 no-padding">
                            <h4>
                                Add players to participate in tournament
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

                                                                <th class=" th1" style="min-width: 300px;">PLAYERS</th>

                                                                <th class="text-center">PRICE</th>
                                                                <th class="text-center">ACTION</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody class="main-taible-body">

                                                            @foreach($role['players'] as $player)
                                                                <?php if(empty($player['player_tournaments'])) continue;   ?>
                                                                <tr id="player_tr-{{$player['id']}}" class="cwt">

                                                                    <td class=" th11"><img id="myteamtimg" class="img-circle"
                                                                                           style="width: 80px;float: left;margin-right: 24px;" src="{{getUploadsPath($player['profile_pic'])}}"> {{$player['name']}}
                                                                    </td>

                                                                    <td class=" point"><p
                                                                                class="myteamtt">
                                                                            <?php
                                                                            $playerids= 0;
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
                                                                        <a onclick="return confirm('Are you sure you want to transfer');" style="text-transform: uppercase"  id="btn-player-{{$player['id']}}"href="javascript:addplayertoteam('{{$role['name']}}','{{$role['id']}}','{{$player['id']}}','{{$player['player_tournaments'][0]['id']}}','{{$playerThisTournamnetPrice}}')" class="btn btn-md bttor1">
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


                            <!--/Choose player-->
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
                        $('.error').html(data.msg);
                        $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                        var url = '{{route("teamdetail", ['team_id'=>'ttid']) }}';

                        url = url.replace('ttid', data.team_id);
                     //   url = url.replace('tid', data.tournament_id);
                       //alert(url);
                  window.location.href = url;

                    } else {
                        $('.error').html(data.msg);
                        $('.error').fadeIn(400).delay(7000).fadeOut(400); //fade out after 3 seconds


                    }

                }
            });
        }
    </script>

@endsection