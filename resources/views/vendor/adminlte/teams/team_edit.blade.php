<?php
//echo '<pre>'; print_r($gameslist);
//echo '<pre>'; print_r($player);die;
?>
@extends('adminlte::layouts.app')

@section('htmlheader_title')

@endsection

@section('main-content')
    <?php getUploadsPath() ?>
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Player Edit
                            <small>{{$team['name']}}</small>
                        </h3>
                        <div class="pull-right">

                        </div>
                    </div>
                    <div class="box-body">
                        @include('adminlte::layouts.form_errors')
                        <div class="container-fluid">
                            {!! Form::open(['url' => route('editTeam',['team_id'=>$team['id']]),'files' => true]) !!}


                            <div class="form-group">
                                <label>Team Name</label>
                                <input
                                        class="form-control" name="team_name" value="{{$team['name']}}"
                                       type="text" placeholder=""/>
                            </div>
                            <div class="form-group">
                                <label>Change Game</label>
                                <select id="game_id" name="tournament_id" class="custom-select form-control">
                                    <option value="">Select</option>

                                    @foreach($tournaments_list as $row)
                                        <option
                                            <?php echo ($team['tournament_id'] == $row['id']) ? 'selected' : '' ?>
                                            value="{{$row['id']}}">{{$row['name']}}</option>
                                    @endforeach
                                </select>
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
                            rolesHtml += '<input name="player_role[]" type="checkbox" value="' + v.id + '">' + v.name
                            rolesHtml += '</label>'
                        });
                    }
                    $("#dynamic_player_roles").html(rolesHtml);
                }
            });
        });
    </script>


@stop