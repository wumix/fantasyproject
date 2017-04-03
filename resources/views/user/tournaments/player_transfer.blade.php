@php


//dd($roles);
//dd($player_info);

        @endphp
@extends('layouts.app')

@section('content')


    <section class="loginc">
        <div class="text-center col-md-10 col-md-offset-1">

            <h3 class="slh">{{$team_name}}</h3>
            <hr class="signupline">
            <img src="{{getUploadsPath($tournament_detail['t_logo'])}}" class="img-fluid" alt="Responsive image" id="mytimg">
            <input id="team_id" type="hidden" value="{{$team_id}}">
            <h3 class="tnt">{{$tournament_detail['name']}}</h3>
        </div>
    </section>
    <!-- .....................TeamStart............................... -->
    <section class="myteam">
        <div class="countaner">
            <div class="col-md-3"></div>
            <section>
                <div id="mytl" class="text-center col-md-3">
                    <h3 class="tnt">PLAYER ROLE LIMIT</h3>
                    <h5 class="myt">You can select players within this limit</h5>
                    <br>
                    <h4 class="myt1">Batsmen: 4</h4>
                    <h4 class="myt1">Bowler: 4</h4>
                    <h4 class="myt1">Allrounders: 2</h4>
                    <h4 class="myt1">Wicketkeeper: 1</h4>

                </div>
            </section>

            <section>
                <div id="myt2" class="text-center col-md-3">
                    <h3 class="tnt1">PLAYER ROLE LIMIT</h3>
                    <h5 class="myt">Selected team players</h5>
                    <br>
                    <h4 class="myt2">Batsmen: <span>4</span></h4>
                    <h4 class="myt2">Bowler: <span>4</span></h4>
                    <h4 class="myt2">Allrounders: <span>2</span></h4>
                    <h4 class="myt2">Wicketkeeper: <span>1</span></h4>

                </div>

            </section>
        </div>
    </section>
    <!-- .....................Team End............................... -->
    <!-- ..............................Table Start................................... -->
    <section>
        <div class="container-fluid" id="tblmarconten">
            <div class="container">
                <div class="row">
                    <div>
                        <center>
                            <h3 class="ah311">SELECTED PLAYERS</h3>
                        </center>
                    </div>


                </div>
                <br>
                <br>
                <br>
                <br>
                <table class="table table-striped" id="tortable">
                    <thead class="main-taible-head">
                    <tr>
                        <th class="border-r th1">PLAYERS</th>
                        <th class="border-r">ROLE</th>
                        <th class="border-r">POINTS</th>

                    </tr>
                    </thead>
                    <tbody id="selected-player" class="main-taible-body">

                        <tr>
                            <td class="border-r1"><img id="myteamtimg" class="img-circle" src="{{getUploadsPath($player_info['profile_pic'])}}">
                               {{$player_info['name']}}
                            </td>

                            <td class="border-r1"><p class="myteamtt">{{$player_info['player_roles'][0]['name']}}</p></td>
                            <td class="border-r1"><p class="myteamtt">{{$player_info['player_tournaments'][0]['pivot']['player_price']}}</p></td>
                            <td>

                                    </td>

                        </tr>



                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- ...............Table End.............................. -->
    <div class="text-center">
        <h3 class="ah3">SELECT PLAYERS</h3>
    </div>
    <br>
    <br>
    <br>
    <br>
    <section>

        <div class="container">


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
                                <div class="col-md-11 tcen ">
                                    <table class="table " id="tortable">
                                        <thead class="main-taible-head1">
                                        <tr>
                                            <th class=" th1">PLAYERS</th>

                                            <th class="point">PRICE</th>
                                            <th class="add">ACTION</th>
                                        </tr>
                                        </thead>
                                        <tbody class="main-taible-body">

                                        @foreach($role['players'] as $player)
                                            <tr id="player_tr-{{$player['id']}}" class="cwt">
                                                <td class=" th11"><img id="myteamtimg" class="img-circle"
                                                                       src="{{getUploadsPath($player['profile_pic'])}}"> {{$player['name']}}
                                                </td>

                                                <td class=" point"><p
                                                            class="myteamtt">{{$player['player_tournaments'][0]['pivot']['player_price']}}</p>
                                                </td>

                                                <td class="add">
                                                    <a onclick="return confirm('Are you sure you want to transfer');" style="text-transform: uppercase"  id="btn-player-{{$player['id']}}"href="javascript:addplayertoteam('{{$role['name']}}','{{$role['id']}}','{{$player['id']}}','{{$player['player_tournaments'][0]['id']}}','{{$player['player_tournaments'][0]['pivot']['player_price']}}')" class="btn btn-md bttor1">
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
                        var url = '{{route("addPlayers", ['team_id'=>"id","tournament_id"=>'tid']) }}';

                        url = url.replace('id', data.team_id);
                        url = url.replace('tid', data.tournament_id);
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