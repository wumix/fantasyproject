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
                        <div class="col-md-12 no-padding">
                            <div class="col-md-6">
                                <img src="{{getUploadsPath($tournament_detail['t_logo'])}}" class="img-fluid" alt="Responsive image" id="mytimg">
                            </div>
                            <div class="col-md-6">
                                <input id="team_id" type="hidden" value="{{$team_id}}">
                                {{$tournament_detail['name']}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tortable">
                                <thead class="main-taible-head">
                                    <tr>
                                        <th class="border-r th1">PLAYERS</th>
                                        <th class="border-r">ROLES</th>
                                        <th class="border-r">POINTS</th>
                                        <th class="th2">TRANSFER PLAYER</th>
                                    </tr>
                                </thead>
                                <tbody id="selected-player" class="main-taible-body">
                                    @foreach($user_team_player as $row)
                                    <tr>
                                        <td class="border-r1"><img id="myteamtimg" class="img-circle"
                                                                   src="{{getUploadsPath($row['profile_pic'])}}">
                                            <span class="selected-player-name" > {{$row['name']}} </span>
                                        </td>
                                        @foreach($row['player_tournaments'] as $key=>$val)

                                        <td class="border-r1"><p class="myteamtt">{{$row['player_roles'][0]['name']}}</p></td>
                                        <td class="border-r1"><p class="myteamtt">{{$val['pivot']['player_price']}}</p></td>
                                        @endforeach
                                        <td>

                                            <a href="{{route('transferplayer', ['team_id'=>$team_id,'player_id'=>$row['id'],'tournament_id'=>$val['id']])}}"
                                               class="btn btn-md bttor1">TRANSFER</a>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--Choose player-->
                    <h3 class="text-center">  Your Points: {{getUserTotalScore(Auth::id())}}</h3>
                    <div class="panel with-nav-tabs panel">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs">

                                @foreach($roles as $key => $role)

                                <li id="tbbox" class="{!! ($key == 0) ? 'active':'' !!}">
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

                                                    <th class=" th1">PRICE</th>
                                                    <th class="add">ADD</th>
                                                </tr>
                                            </thead>
                                            <tbody class="main-taible-body">

                                                @foreach($role['players'] as $player)
                                                <tr id="player_tr-{{$player['id']}}" class="cwt">
                                                    <td class=" th11"><img id="myteamtimg" class="img-circle"
                                                                           src="{{getUploadsPath($player['profile_pic'])}}"/>
                                                        <span class="selected-player-name"> {{$player['name']}}</span>
                                                    </td>

                                                    <td class=" point"><p
                                                            class="myteamtt">{{$player['player_tournaments'][0]['pivot']['player_price']}}
                                                        </p>
                                                    </td>

                                                    <td class="add">
                                                        <a id="btn-player-{{$player['id']}}"
                                                           href="javascript:addplayertoteam('{{$role['name']}}','{{$role['id']}}','{{$player['id']}}','{{$player['player_tournaments'][0]['id']}}','{{$player['player_tournaments'][0]['pivot']['player_price']}}')"
                                                           class="btn btn-md bttor1">Add To
                                                            Team
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
</section>

<div class='error' style='display:none'></div>

@endsection
@section('addteamjs')
{{--<script>--}        }


        {{--$("#team_submit").submit(function (event        ) {--}}
        {{--event.preventDefault        ();--}}
        {{--var teamName = $("#team_name").va        l()--}}
        {{--var tournamentId =         '';--}}
        {{--$.aja        x({--}}
        {{--type: 'GE        T',--}}
        {{--url: '{{route('teamNamePostAjax')}        }',--}}
        {{--data: {tournament_id: tournamentId, name: teamNam        e},--}}
        {{--success: function (data        ) {--}}
        {{--if (data.status == "ok"        ) {--}}
        {{--$("#team_name").attr('disabled', tru        e);--}}
        {{--$("#addstatus").html("team added sucessfully        ");--}}
        {{--$('<input type="hidden" id="team_id" value="' + data.team_id + '"/>').insertBefore("#addstatus");--}}
        {{--}-        -}}
        {{--else {--}}
        {{--$("#addstatus").html("team Name Already Take        n")--}}
      {{--}--}}

          {{--}--}}
        {{--});--}}
        {{--});--}}
              {{--</script>--}}
        <script>
            fun    ction addplayertoteam(rolename, roleid, playerid, tournamentid, player_price) {

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
                    $("#your_points").html(' Your Points:' + data.player_score);
                    var obj = data.player;
                    $('.error').html(data.msg);
                    $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                    $('#btn-player-' + playerid).attr('disabled', true);
                    $('#btn-player-' + playerid).remove();
                    $('#total-score-user').html(obj.player_score);
                    var t = '<tr>';
                    t += '<input type=hidden" name="player_id_t" value="' + obj.id + '"/>';
                    t += '<td class="border-r1"><img id="myteamtimg" class="img-circle"  src="' + obj.profile_pic + ' "><span class="selected-player-name">' + obj.name + '</span> </td>';
                    t += '<td class="border-r1"><p class="myteamtt"></p> ' + obj.role_name + '</span></td>';
                    t += '<td class="border-r1"><p class="myteamtt"></p>' + obj.price + '</td>';
                    var url = '{{ route("transferplayer", ["team_id"=>"id","player_id"=>'pid',"tournament_id"=>'tid']) }}';
                    url = url.replace('pid', obj.id);
                    url = url.replace('id', obj.team_id);
                    url = url.replace('tid', obj.tournament_id);
                    t += '<td><a href="' + url + '" id="" class="btn btn-md bttor1">TRANSFER</a></td >';
                    t += '</tr>';
                    $('#selected-player').append(t);
                    t = "";
                    t += '<tr id="player_tr_' + obj.id + '" class="cwt"><td class=" point"><p class="myteamtt">Player Added Successfully</p></td></tr> ';
                    $('#player_tr-' + obj.id).html(t);
                    } else {
                    $('.error').html(data.msg);
                    $('.error').fadeIn(400).delay(7000).fadeOut(400); //fade out after 3 seconds


                    }

                    }
            });
            }
            </script>

            @endsection