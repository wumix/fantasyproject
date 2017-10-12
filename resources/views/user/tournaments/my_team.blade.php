@extends('layouts.app')

@section('title')
    Make your team
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

                            <div class="col-md-9">

                                <div class="col-md-6">

                                    <div class="col-md-12">

                                        <input id="team_id" type="hidden" value="{{$team_id}}">

                                        <h3 style="color: #92b713; font-weight: 900; text-transform: uppercase;">{{$tournament_detail['name']}}</h3>
                                    </div>
                                    <div class="col-md-12 small-sec-heading">
                                        <h3>Your Points: <span
                                                    id="your_points">{{getUserTotalScore(Auth::id(),$tournament_detail['id'])}}</span>
                                        </h3>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="row mt26">
                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="tortable">
                                        <thead class="main-taible-head">
                                        <tr>
                                            <th class="border-r th1" style="min-width: 300px;
">PLAYERS
                                            </th>
                                            <th class="border-r">ROLES</th>
                                            <th class="border-r">POINTS</th>
                                            <th class="th2" colspan="2">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody id="selected-player" class="main-taible-body">
                                        @if(!empty($user_team_player))
                                        @foreach($user_team_player as $row)
                                            {{--{{ dd($user_team_player)}}--}}
                                            <tr id="player_tr-del-{{$row['id']}}">
                                                <td class="border-r1 text-left" style="min-width: 300px;">
                                                    <a class="colorbox"
                                                       href="{{route('showPlayerStats', ['player_id'=>$row['id']])}}">
                                                        <img class="img-thumbnail"
                                                             src="{{getUploadsPath($row['profile_pic'])}}"
                                                             style="width: 80px;float: left;margin-right: 24px;">
                                                    </a>

                                                    <span class="selected-player-name"> {{ucwords($row['name'])}} </span>
                                                </td>
                                                @foreach($row['player_tournaments'] as $key=>$val)
                                                    <td class="border-r1">
                                                        {{$row['player_roles'][0]['name']}}
                                                    </td>
                                                    <td class="border-r1 ">
                                                        <?php
                                                        $playerThisTournamnetPrice = 0;
                                                        if (!empty($val['pivot'])) {
                                                            $playerThisTournamnetPrice = $val['pivot']['player_price'];
                                                        }
                                                        ?>
                                                        {{$playerThisTournamnetPrice}}
                                                    </td>
                                                @endforeach

                                                <td class="cwt">

                                                    <a onclick="return confirm('Are you sure you want to delete this player')"
                                                       href="javascript:deletePlayer('{{$row['id']}}','{{$playerThisTournamnetPrice}}')"
                                                       class=" btn btn-md bttor1">Delete Player
                                                    </a>

                                                </td>
                                                {{--<td>--}}

                                                {{--<a href="{{route('transferplayer', ['team_id'=>$team_id,'player_id'=>$row['id'],'tournament_id'=>$val['id']])}}"--}}
                                                {{--class="btn btn-green">Transfer Player--}}
                                                {{--</a>--}}

                                                {{--</td>--}}

                                            </tr>
                                        @endforeach
                                            @else
                                            <td id="noplayer" class="border-r1" colspan="4">
                                                No Player added yet
                                            </td>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <h4>
                                        Add players to participate in tournament
                                    </h4>

                                    <div class="help-block">
                                        For playing tournament you will need:
                                        <ul>
                                            <li>

                                                <strong>Batsman: </strong>4
                                            </li>
                                            <li><strong>Bowler: </strong>4</li>
                                            <li><strong>All Rounder: </strong>2</li>
                                            <li><strong>Wicket Keeper: </strong>1</li>
                                        </ul>
                                        </small>
                                        <div class="alert alert-danger">
                                            <ul>
                                                <li>You can make a team with in available points.
                                                    i.e {{getUserTotalScore(Auth::id(),$tournament_detail['id'])}}</li>
                                                <li>You must have 11 players in your team to play this tournament.</li>
                                            </ul>
                                        </div>

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

                                                    @foreach($roles as $key=>$role)
                                                        <div class="tab-pane fade {!! ($key == 0) ? 'in active':'' !!}"
                                                             id="tab{{$role['id']}}default">
                                                            <div class="table-responsive ">
                                                                <table class="table table-hover" id="tortable">
                                                                    <thead class="main-taible-head1">
                                                                    <tr>
                                                                        <th class=" th1" style="min-width: 300px;
">PLAYERS
                                                                        </th>

                                                                        <th class="point">Team</th>
                                                                        <th class="add">Points required to buy</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody class="main-taible-body">

                                                                    @foreach($role['players'] as $player)
                                                                        <?php
                                                                        if (empty($player['player_tournaments'][0]['id']))
                                                                            continue;
                                                                        ?>
                                                                        <tr id="player_tr-{{$player['id']}}"
                                                                            class="cwt">
                                                                            <td class=" th11 text-left" style="min-width: 300px;
">


                                                                                <a class="colorbox"
                                                                                   href="{{route('showPlayerStats', ['player_id'=>$player['id']])}}">

                                                                                    <img style="width: 80px;float: left;margin-right: 24px;"
                                                                                         class="img-thumbnail"
                                                                                         <?php $profilepic = null;
                                                                                         if (!empty($player['profile_pic'])) {
                                                                                             $profilepic = $player['profile_pic'];
                                                                                         }

                                                                                         ?>
                                                                                         src="{{getUploadsPath($profilepic)}}"/>
                                                                                </a>
                                                                                <span class="selected-player-name"> {{$player['name']}}</span>
                                                                            </td>
                                                                            <td class="text-left">
                                                                                @if(!empty($player['player_actual_teams']))
                                                                                    @foreach($player['player_actual_teams'] as $palyeractualteam)
                                                                                        {{$palyeractualteam['name']}}
                                                                                    @endforeach
                                                                                @else
                                                                                    N/A
                                                                                @endif
                                                                            </td>

                                                                            <td class=" text-left"><p
                                                                                        class="myteamtt">
                                                                                    <?php
                                                                                    $playerThisTournamnetPrice = 0;
                                                                                    $playerid = 0;
                                                                                    if (!empty($player['player_tournaments'][0]['pivot']['player_price'])) {
                                                                                        $playerThisTournamnetPrice = $player['player_tournaments'][0]['pivot']['player_price'];
                                                                                    }
                                                                                    if (!empty($player['player_tournaments'][0]['id'])) {
                                                                                        $playerid = $player['player_tournaments'][0]['id'];
                                                                                    }
                                                                                    ?>
                                                                                    {{$playerThisTournamnetPrice}}
                                                                                </p>
                                                                            </td>

                                                                            <td class="add text-left">
                                                                                <a
                                                                                   id="btn-player-{{$player['id']}}"
                                                                                   href="javascript:addplayertoteam('{{$role['name']}}','{{$role['id']}}','{{$player['id']}}','{{$playerid}}','{{$playerThisTournamnetPrice}}')"
                                                                                   class="btn btn-green">Add To Team
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
                                </div>
                            </div>
                            <div class="point-summery col-md-3" id="point-summery">

                                <div class="col-md-12">
                                    <h4 class="small-sec-heading">
                                        Remaining points <span class="pull-right"
                                                               id="your_points1">{{getUserTotalScore(Auth::id(),$tournament_detail['id'])}}</span>
                                    </h4>
                                    <hr class="light"/>
                                    <h5 style="color: #92B713;">
                                        You have selected
                                    </h5>
                                    <ul class="players-cal-summery">
                                        <li>
                                            Batsman
                                            <span class="pull-right">
                                               <span id="remaining-batsman">{{getPlayerNoInTeam(\Auth::id(),$team_id,5)}}</span>/4
                                            </span>
                                        </li>
                                        <li>
                                            Bowler
                                            <span class="pull-right">
                                                <span id="remaining-bowler">{{getPlayerNoInTeam(\Auth::id(),$team_id,6)}}</span>/4
                                            </span>
                                        </li>
                                        <li>
                                            All Rounder
                                            <span class="pull-right">
                                                <span id="remaining-ar">{{getPlayerNoInTeam(\Auth::id(),$team_id,7)}}</span>/2
                                            </span>
                                        </li>
                                        <li>
                                            Wicket Keeper
                                            <span class="pull-right">
                                                <span id="remaining-wk">{{getPlayerNoInTeam(\Auth::id(),$team_id,8)}}</span>/1
                                            </span>
                                        </li>
                                        <li>
                                            <span id="user_team_complete" class="pull-right">
                                                @if(getUserTeamPlayersCount($team_id)==11)
                                                    <a class="btn btn-green" style="margin-top: 5px;"
                                                       href="{{route("team-completed", ['team_id'=>$team_id]) }}">Confirm
                                                        Team</a>
                                                @endif
                                            </span>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Share Module-->
                                <div class="col-md-12 text-center">
                                    @include('layouts.invite_sec')
                                </div>
                                <!-- Share Module-->

                            </div>
                        </div>
                        <!---->

                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class='error' style='display:none'></div>

@endsection
@section('js')



    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
//            $(window).scroll(function () {
//                var scrollPositionTop = 0;
//                if($(window).scrollTop() >= 3300){
//                    scrollPositionTop = 3300;
//                }else{
//                   scrollPositionTop = $(window).scrollTop();
//                }
//                $("#point-summery").stop().animate({
//                    "marginTop": (scrollPositionTop) + "px",
//                    "marginLeft": ($(window).scrollLeft()) + "px"
//                }, "2000");
//            });
        });
        function deletePlayer(playerid, player_price) {

            var teamid = $("#team_id").val();
            $.ajax({
                type: 'POST',
                url: '{{route('deletePlayerAjax')}}',
                data: {
                    player_id: playerid,
                    player_price: player_price,
                    team_id: teamid, _token: '{{csrf_token()}}'
                },
                success: function (data) {
                    if (data.success == true) {
                        if (data.team_complete == false) {
                            $('#user_team_complete').html('');
                        }
                        $("#remaining-batsman").html(data.batsmen);
                        $("#remaining-bowler").html(data.bowler);
                        $("#remaining-ar").html(data.allrounder);
                        $("#remaining-wk").html(data.wicketkeeper);
                        $('#your_points').html(data.score);
                        $('#your_points1').html(data.score);
                        //$('#player_tr-del-' + data.player_id).html('<span>Deleted</span>');
                        $('#player_tr-del-' + data.player_id).remove();
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
                        location.reload();
                    } else {
                        $.toast({
                            heading: 'Error',
                            text: data.msg,
                            icon: 'error',
                            loader: true, // Change it to false to disable loader
                            position: 'top-right',
                            showHideTransition: 'slide',
                            hideAfter: 10000,
                            allowToastClose: true,
                            loaderBg: '#92B713'  // To change the background
                        });
                    }

                }
            });
        }

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
                        if (data.teamsuccess == true) {


                            var teamCompletedUrl = '{{route("team-completed", ['team_id'=>'id']) }}';
                            teamCompletedUrl = teamCompletedUrl.replace('id', data.team_id)
                            var html = '<a href="' + teamCompletedUrl + '" class="btn btn-green" style="margin-top: 5px;">Confirm Team</a>';
                            // alert(html);
                            $('#user_team_complete').html(html);
                            // teamCompletedUrl = teamCompletedUrl.replace('id', data.team_id);
                            //  alert(teamCompletedUrl);
                            // console.log(teamCompletedUrl);

                        }
                        $("#remaining-batsman").html(data.batsmen);
                        $("#remaining-bowler").html(data.bowler);
                        $("#remaining-ar").html(data.allrounder);
                        $("#remaining-wk").html(data.wicketkeeper);


                        $("#your_points").html(data.player_score);
                        $("#your_points1").html(data.player_score);
                        var obj = data.player;

//                        $('.error').html(data.msg);
//                        $('.error').fadeIn(200).delay(1000).fadeOut(200); //fade out after 3 seconds
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

                        $('#btn-player-' + playerid).attr('disabled', true);
                        $('#btn-player-' + playerid).remove();
                        $('#total-score-user').html(obj.player_score);
                        var t = '<tr id="player_tr-del-' + obj.id + '">';
                        var staturl = '{{ route("showPlayerStats", ["player_id"=>'pid']) }}';
                        staturl = staturl.replace('pid', obj.id);
                        t += '<input type=hidden" name="player_id_t" value="' + obj.id + '"/>';
                        t += '<td class="border-r1 text-left"><a href="' + staturl + '" class="colorbox cboxElement">' +
                                '<img id="myteamtimg" class="img-thumbnail" style="width: 80px;float: left;margin-right: 24px;"  src="' + obj.profile_pic + ' "></a><span class="selected-player-name">' + obj.name + '</span> </td>';
                        t += '<td class="border-r1"> ' + obj.role_name + '</span></td>';
                        t += '<td class="border-r1">' + obj.price + '</td>';
                        var url = '{{ route("transferplayer", ["team_id"=>"id","player_id"=>'pid',"tournament_id"=>'tid']) }}';
                        //  var url = '#';
                        url = url.replace('pid', obj.id);
                        url = url.replace('id', obj.team_id);
                        url = url.replace('tid', obj.tournament_id);
                        t += '<td  class="cwt"><a onclick="return confirm(\'Are you sure you want to add this player\')" href="javascript:deletePlayer(' + obj.id + ',' + obj.price + ')" id="" class="btn btn-md bttor1">Delete Player</a></td >';
                        //  t += '<td><a href="' + url + '" class="btn btn-green">Transfer Player</a></td >';

                        // t += '<td>Player transfer is disabled by the end of today\'s match!</td >';
                        t += '</tr>';
                        $('#selected-player').append(t);
                        t = "";
                        $('#player_tr-' + obj.id).html(t);
                        $('#noplayer').hide();
                    } else {
//                        $('.error').html(data.msg);
//                        $('.error').fadeIn(200).delay(1500).fadeOut(200); //fade out after 3 seconds
                        $.toast({
                            heading: 'Error',
                            text: data.msg,
                            icon: 'error',
                            loader: true, // Change it to false to disable loader
                            position: 'top-right',
                            showHideTransition: 'slide',
                            hideAfter: 10000,
                            allowToastClose: true,
                            loaderBg: '#92B713'  // To change the background
                        });


                    }

                }
            });
        }
    </script>
    <script>
        document.getElementById('shareBtn').onclick = function () {
            FB.ui({
                method: 'share',
                display: 'popup',
                href: '{{URL::to('/')}}' + '/signup/?referral_key={{\Auth::user()->referral_key}}',
            }, function (response) {
            });
        }
    </script>

@endsection
@section('FbJsSdk')
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                appId: '{{config('const.fbappid')}}',
                autoLogAppEvents: true,
                xfbml: true,
                version: 'v2.9'
            });
            FB.AppEvents.logPageView();
        };
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@endsection
@section('facbook-og-tags')
    <meta property="og:url" content="{{URL::to('/')}}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="Gamithon Fantasy"/>
    <meta property="og:description" content="Join referral here"/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="600"/>
    <meta property="og:image" content="{{URL::to('assets-new/img/default-profile-pic-1.png')}}"/>
    <meta property="fb:app_id" content="{{config('const.fbappid')}}"/>
@stop