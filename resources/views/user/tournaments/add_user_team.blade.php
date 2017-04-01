@php

    //dd($tournament_detail);

@endphp
@extends('layouts.app')

@section('content')

    <section class="loginc">
        <div class="text-center col-md-10 col-md-offset-1">
            <h3 class="slh">MAKE YOUR TEAM</h3>

            <hr class="signupline">
        </div>
    </section>
    <!-- .....................TeamStart............................... -->
    <section class="team">
        <div class="countaner">
            <section>
                <div class=" col-md-6">
                    <img src="{{getUploadsPath($tournament_detail['t_logo'])}}" class="img-fluid" alt="Responsive image"
                         id="imgl">
                    <!--            <img id="imgl" src="psl-images\BPL_OFFICIAL_LOGO.JPG" class="img-responsive" alt="Cinque Terre" >-->
                </div>
            </section>
            <section>
                <div class="col-md-6">
                    <h3 class="tnt">{{$tournament_detail['name']}}</h3>
                    <br>
                    <h4 class="tnt1">Tournament Cost:<span class="tnt2">{{$tournament_detail['tournament_price']}}</span></h4>
                    <br>
                    <h4 class="tnt1">Current Points:<span class="tnt2">{{getUserTotalScore(Auth::id())}}</span></h4>
                    <br>

                    <div class="col-md-5">
                        {{--@if($team_name==NULL)--}}
                        <form id="team_submit">
                            <input type="text" id="team_name" class="fw form-control"
                                   placeholder="Enter Your Team Name">
                            <button id="save_button" type="submit" class="btn  btn-lg btn-block save-button">SAVE</button>

                        </form>
                        <br>

                        {{--@else--}}

                            {{--<h4 class="tnt1">Team Name:<span class="tnt2">{{$team_name}}</span></h4>--}}
                            {{--<input id="team_id" type="hidden" name="team_id" value="{{$team_id}}"/>--}}
                            {{--<h4 id="addstatus" class="tn3">Proceed</h4>--}}
                        {{--@endif--}}
                    </div>

                </div>
            </section>
        </div>
        <!-- .....................Team End............................... -->
        <div class='error' style='display:none'></div>

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
        $("#save_button").remove();
        $('.error').html('team added sucessfully');
        $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
        window.location.reload();


    $('<input type="hidden" id="team_id" value="' + data.team_id + '"/>').insertBefore("#addstatus");
    }
    else {
        $('.error').html('Team Name Already taken');
        $('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds

    }

    }
    });
    });
    </script>
    {{--<script>--}}
    {{--function addplayertoteam(rolename, roleid, playerid, tournamentid) {--}}
    {{--var arr_player_id = [];--}}
    {{--arr_player_id.push(playerid);--}}
    {{--var teamid = $("#team_id").val();--}}
    {{--var player_price = $("#player_price").html();--}}

    {{--$.ajax({--}}
    {{--type: 'POST',--}}
    {{--url: '{{route('addUserTeamPlayerAjax')}}',--}}
    {{--data: {--}}
    {{--tournament_id: tournamentid,--}}
    {{--player_id: arr_player_id,--}}
    {{--role_id: roleid,--}}
    {{--role_name: rolename,--}}
    {{--player_price: player_price,--}}
    {{--team_id: teamid, _token: '{{csrf_token()}}'--}}
    {{--},--}}
    {{--success: function (data) {--}}

    {{--if (data.success == true) {--}}
    {{--$('#btn-player-' + playerid).attr('disabled', true);--}}
    {{--$('#btn-player-' + playerid).attr('class', 'btn btn-danger');--}}

    {{--} else {--}}

    {{--}--}}

    {{--}--}}
    {{--});--}}
    {{--}--}}
    {{--</script>--}}

@endsection