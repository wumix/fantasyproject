<?php
//echo '<pre>'; print_r($player);die;
?>
@extends('adminlte::layouts.app')

@section('htmlheader_title')

@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Player Edit</h3>
                </div>
                <div class="box-body">
                    <div class="container-fluid">
                        {!! Form::open(['url' => route('postEditGame')]) !!}
                        <div class="form-group">
                            <label>Player Name</label>
                            <input type="hidden" name="player_id" value="{{$player['id']}}"/>
                            <input required class="form-control" name="player_name" value="{{$player['name']}}" type="text" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label>Player Current Game</label>
                            <input disabled class="form-control" type="game_name" value="{{$player['player_games']['name']}}"/>

                        </div>

                        <div class="form-group">
                            <label>Player Roles</label><br>
                            @foreach($player['player_games']['game_roles'] as $key => $val)
                            {{$val['name']}}
                            <input
                                type="checkbox"
                                name="player_role[]"
                                value="{{$val['id']}}"
                                <?php echo (in_array($val['id'], $player['player_roles'])) ? 'checked' : '' ?>
                                />
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label>Change Game</label>
                            <select id="game_id" class="custom-select form-control">
                                <option value="">Select</option>
                                <?php $gameid; ?>
                                @foreach($gameslist as $row)
                                <option value="{{$row['id']}}">{{$row['name']}}</option>
                                <?php $gameid = $row['id']; ?>
                                @endforeach
                            </select>
                            <input type="hidden" name="game_id" value=" <?php echo $gameid; ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Player roles</label>
                            <div id="dynamic_player_roles">No game roles defined.<!--Player roles will here--></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $("#add_more_roles").click(function (event) {
        event.preventDefault();

        $('<input  class="form-control" name="role_name[]" value="" type="text" placeholder="" />').insertBefore("#add_more_roles");
    });
</script>
<script>
    $("#game_id").change(function (event) {
        var menuId = this.value;
        $.ajax({
            type: 'GET',
            url: '{{route('ajax_get_game_terms')}}',
            data: {game_id: menuId},
            success: function (data) {
                var gameRoles = data.game_roles;
                var rolesHtml = '';
                if (gameRoles.length == 0) {
                    rolesHtml = 'No game roles selected';
                } else {
                    $.each(gameRoles, function (k, v) {
                        rolesHtml += '<label class="checkbox-inline">';
                        rolesHtml += '<input name="player_roles[]" type="checkbox" value="' + v.id + '">' + v.name
                        rolesHtml += '</label>'
                    });
                }
                $("#dynamic_player_roles").html(rolesHtml);
            }
        });
    });
</script>
@stop