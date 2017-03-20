@extends('adminlte::layouts.app')

@section('htmlheader_title')
Games
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Player</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['url' => route('postAddPlayer'),'files'=>true]) !!}
                    <div class="form-group">
                        <label>Name</label>
                        <input required value="{!! old('name') !!}" class="form-control" id="name"
                               placeholder="Enter Player Name" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>Select Player Game</label>
                        <select id="game_id" name="game_id" class="custom-select form-control">
                            <option value="">Select</option>
                            <?php $gameid; ?>
                            @foreach($result as $row)
                            <option value="{{$row['id']}}">{{$row['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Player roles</label>
                        <div id="dynamic_player_roles">No game roles defined.<!--Player roles will here--></div>
                    </div>
                    <div class="form-group">
                        <label>Profile Picture</label>
                        <input name="profile_pic" type="file"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    {!! Form::close() !!}
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