@php

    //dd($tournament_max_roles_values);
  // echo Auth::id();
     // dd($user_team_players);
        //dd($user_team_players1);
    //dd($team_id);
         //  dd($tournament_detail);
           foreach($user_team_players['user_team_player'] as $row){
           $i=0;
              foreach($tournament_detail['tournament_players'] as $row1){
              //   echo $row['id']." " ;echo $row1['id'];

              if($row['id']==$row1['id']){

                unset($tournament_detail['tournament_players'][$i]);

              }
              $i++;
              }
               }
               //this array contains list of player that are not in user team kindly dont remove this code it may be helpfull in future
        // dd($tournament_detail['tournament_players']);

              $bowlers=[];

             $batsmen=[];
             $wicketkeeper=[];
             foreach($tournament_detail['tournament_players']as $row){
                  if($row['player_roles'][0]['name']=="bowler")$bowlers[]=$row ;
                   if($row['player_roles'][0]['name']=="batsmen")$batsmen[]=$row ;
                   if($row['player_roles'][0]['name']=="wicket keeper")$wicketkeeper[]=$row ;
             }

@endphp
@extends('layouts.app')

@section('content')
    <section class="loginc">
        <div class="text-center col-md-10 col-md-offset-1">
            <h3 class="slh">{{$team_name}}</h3>
            <hr class="signupline">
            <img src="{{getUploadsPath($tournament_detail['t_logo'])}}" class="img-fluid" alt="Responsive image"
                 id="mytimg">
            <input type="hidden" id="team_id" value="{{$team_id}}"/>
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
                    @foreach($tournament_max_roles_values['tournament_role_max'] as $row)

                        <h4 class="myt1">{{$row['name']}}: {{$row['pivot']['max_limit']}}</h4>

                    @endforeach

                </div>
            </section>

            <section>
                <div id="myt2" class="text-center col-md-3">
                    <h3 class="tnt1">PLAYER ROLE LIMIT</h3>
                    <h5 class="myt">Selected team players</h5>
                    <br>
                    <h4 class="myt2">Batsmen: <span>{{count($batsmen)}}</span></h4>
                    <h4 class="myt2">Bowler: <span>{{count($bowlers)}}</span></h4>
                    <h4 class="myt2">Allrounders: <span>{{count($batsmen)}}</span></h4>
                    <h4 class="myt2">Wicketkeeper: <span>{{count($wicketkeeper)}}</span></h4>
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
                    <div class="row" id="ah31">
                        <h3 class="col-lg-7 ah3" id="ah31">YOU ARE GOING TO TRANSFER THIS PLAYER</h3>
                        <h3 class="col-lg-5 ah3" id="ah31" style="padding-right: 5%;">YOUR TOTAL POINTS:<span
                                    id="total-score-user">{{getUserTotalScore(Auth::id())}}</span></h3>
                    </div>


                </div>

                <table class="table table-striped" id="tortable">
                    <thead class="main-taible-head">
                    <tr>
                        <th class="border-r th1">PLAYERS</th>
                        <th class="border-r">ROLES</th>
                        <th class="border-r">POINTS</th>
                        <th class="th2">CHANGE PLAYER</th>
                    </tr>
                    </thead>
                    <tbody id="selected-player" class="main-taible-body">
                    @foreach($user_team_players['user_team_player'] as $row)
                        @if($row['id']==$player_info['id'])
                        <tr>
                            <td class="border-r1"><img id="myteamtimg" class="img-circle"
                                                       src="{{getUploadsPath($row['profile_pic'])}}">
                                <span class="selected-player-name">{{$row['name']}}</span>
                            </td>
                            <td class="border-r1"><p class="myteamtt">{{$row['player_roles'][0]['name']}}</p></td>
                            <td class="border-r1"><p class="myteamtt">
                                    @foreach($row['player_tournaments'] as $row1)
                                        @if($row1['pivot']['tournament_id']==$tournament_detail['id'])
                                            {{$row1['pivot']['player_price']}}
                                        @endif
                                    @endforeach
                                </p></td>
                            <td>

                            </td>

                        </tr>
                        @endif
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- ...............Table End.............................. -->
    <div class='error' style='display:none'>Event Created</div>
    <div class="text-center">
        <h3 class="ah3">AVAILABLE PLAYERS</h3>
    </div>
    <section>

        <div class="container">


            <div class="panel with-nav-tabs panel">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li id="tbbox" class="active"><a id="tabt" href="#tab1default" data-toggle="tab">Batsmen</a>
                        </li>
                        <li id="tbbox"><a id="tabt" href="#tab2default" data-toggle="tab">Bowlers</a></li>
                        <li id="tbbox"><a id="tabt" href="#tab3default" data-toggle="tab">Allrounder </a></li>
                        <li id="tbbox"><a id="tabt" href="#tab3default" data-toggle="tab">Wicketkeeper</a></li>

                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active " id="tab1default">
                            <div class="col-md-11 tcen ">
                                <table class="table " id="tortable">
                                    <thead class="main-taible-head1">
                                    <tr>
                                        <th class=" th1">PLAYERS</th>

                                        <th class="point">POINTS</th>
                                        <th class="add">ADD</th>
                                    </tr>
                                    </thead>
                                    <tbody class="main-taible-body">

                                    @foreach($batsmen as $row)

                                        <tr id="player_tr_{{$row['id']}}" class="cwt">
                                            <td class=" th11"><img id="myteamtimg" class="img-circle"
                                                                   src="{{getUploadsPath($row['profile_pic'])}}"> {{$row['name']}}
                                            </td>

                                            <td class=" point"><p class="myteamtt">{{$row['pivot']['player_price']}}</p>
                                            </td>
                                            <td class=" add">
                                                <a id="btn-player-{{$row['id']}}"
                                                   href="javascript:addplayertoteam('{{$row['player_roles'][0]['name']}}','{{$row['player_roles'][0]['id']}}','{{$row['id']}}','{{$tournament_detail['id']}}','{{$row['pivot']['player_price']}}')"
                                                   class="btn btn-md bttor1" onclick="return confirm('Are you sure you want replace this player')">Replace with {{$player_info['name']}} </a>
                                            </td>

                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2default">
                            <div class="col-md-11 tcen ">
                                <table class="table " id="tortable">
                                    <thead class="main-taible-head1">
                                    <tr>
                                        <th class=" th1">PLAYERS</th>

                                        <th class="point">POINTS</th>
                                        <th class="add">ADD</th>
                                    </tr>
                                    </thead>
                                    <tbody class="main-taible-body">
                                    @foreach($bowlers as $row)
                                        <tr id="player_tr_{{$row['id']}}" class="cwt">
                                            <td class=" th11"><img id="myteamtimg" class="img-circle"
                                                                   src="{{getUploadsPath($row['profile_pic'])}}"> {{$row['name']}}
                                            </td>

                                            <td class=" point"><p class="myteamtt">{{$row['pivot']['player_price']}}</p>
                                            </td>
                                            <td class=" add">
                                                <a id="btn-player-{{$row['id']}}"
                                                   href="javascript:addplayertoteam('{{$row['player_roles'][0]['name']}}','{{$row['player_roles'][0]['id']}}','{{$row['id']}}','{{$tournament_detail['id']}}','{{$row['pivot']['player_price']}}')"
                                                   class="btn btn-md bttor1" onclick="return confirm('Are you sure you want replace this player')">Replace with {{$player_info['name']}} </a>
                                            </td>

                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab3default">
                            <div class="col-md-11 tcen ">
                                <table class="table " id="tortable">
                                    <thead class="main-taible-head1">
                                    <tr>
                                        <th class=" th1">PLAYERS</th>

                                        <th class="point">POINTS</th>
                                        <th class="add">ADD</th>
                                    </tr>
                                    </thead>
                                    <tbody class="main-taible-body">

                                    @foreach($wicketkeeper as $row)
                                        <tr id="player_tr_{{$row['id']}}" class="cwt">
                                            <td class=" th11"><img id="myteamtimg" class="img-circle"
                                                                   src="{{getUploadsPath($row['profile_pic'])}}"> {{$row['name']}}
                                            </td>

                                            <td class=" point"><p class="myteamtt">{{$row['pivot']['player_price']}}</p>
                                            </td>
                                            <td class=" add">
                                                <a id="btn-player-{{$row['id']}}"
                                                   href="javascript:addplayertoteam('{{$row['player_roles'][0]['name']}}','{{$row['player_roles'][0]['id']}}','{{$row['id']}}','{{$tournament_detail['id']}}','{{$row['pivot']['player_price']}}')"
                                                   class="btn btn-md bttor1" onclick="return confirm('Are you sure you want replace this player')">Replace with {{$player_info['name']}} </a>
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                                <div class="col-md-11 tcen "></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('addteamjs')
    <script>


        $("#team_submit").submit(function (event) {
            event.preventDefault();
            var teamName = $("#team_name").val()
            var tournamentId = '{{$tournament_detail['id']}}';
            $.ajax({
                type: 'GET',
                url: '{{route('teamNamePostAjax')}}',
                data: {tournament_id: tournamentId, name: teamName},
                success: function (data) {
                    if (data.status == "ok") {
                        $("#team_name").attr('disabled', true);
                        $("#addstatus").html("team added sucessfully");
                        $('<input type="hidden" id="team_id" value="' + data.team_id + '"/>').insertBefore("#addstatus");
                    }
                    else {
                        $("#addstatus").html("team Name Already Taken")
                    }

                }
            });
        });
    </script>
    <script>
        function addplayertoteam(rolename, roleid, playerid, tournamentid, player_price) {
            var arr_player_id = [];
            arr_player_id.push(playerid);
            var teamid = $("#team_id").val();


            $.ajax({
                type: 'POST',
                url: '{{route('addUserTeamPlayerAjax')}}',
                data: {
                    tournament_id: tournamentid,
                    player_id: arr_player_id,
                    role_id: roleid,
                    role_name: rolename,
                    player_price: player_price,
                    team_id: teamid, _token: '{{csrf_token()}}'
                },
                success: function (data) {


                    if (data.success == true) {


                        $('.error').html(data.msg);
                        $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                        $('#btn-player-' + playerid).attr('disabled', true);

                        $('#btn-player-' + playerid).remove();

                        var obj = data.player;
                        $('#total-score-user').html(obj.player_score);
                        var t = '<tr>';
                        t += '<input type=hidden" name="player_id_t" value="' + obj.id + '"/>';
                        t += '<td class="border-r1"><img id="myteamtimg" class="img-circle"  src="' + obj.profile_pic + ' "><span class="selected-player-name">' + obj.name + '</span> </td>';
                        t += '<td class="border-r1"><p class="myteamtt"></p>' + obj.price + '</td>';
                        t += '<td class="border-r1"><p class="myteamtt"></p> ' + obj.role_name + '</span></td>';
                        t += '<td><button id="" class="btn btn-md bttor1">TRANSFER</button></td >';
                        t += '</tr>';
                        $('#selected-player').append(t);
                        t = "";
                        t += '<tr id="player_tr_1" class="cwt"><td class=" point"><p class="myteamtt">Player Added Successfully</p></td></tr> ';
                        $('#player_tr_' + obj.id).html(t);


                    } else {


                    }

                }
            });
        }
    </script>

@endsection