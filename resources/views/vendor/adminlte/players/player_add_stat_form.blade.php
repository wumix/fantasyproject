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
                        <h3 class="box-title">Add {{$player_info[0]['name']}} Stats</h3>
                    </div>
                    <div class="box-body">
                        @include('adminlte::layouts.form_errors')
                        {!! Form::open(['url' => route('postPlayerStats',['player_id'=>$player_info[0]['id']]),'files'=>true]) !!}

                        @foreach($gametypestats as $key=>$stats)


                                <label> {{$stats['type_name']}}</label>
                                @foreach($stats['game_type_stats'] as $key=>$val)
                                    <div class="form-group">
                                        <label>{{$val['stat_form']}}</label>
                                        <div class="form-group">
                                            <label></label>
                                            <input name="game_type_stat_id[{{$val['id']}}]" placeholder="{{$val['name']}}" type="text">
                                        </div>
                                    </div>

                                @endforeach


                        @endforeach
                        <div class="form-group">
                            <input type="submit" class="btn btn-success"/>
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
                            rolesHtml += '<input name="player_roles[]" type="radio" required value="' + v.id + '"> ' + v.name
                            rolesHtml += '</label><br/>'
                        });
                    }
                    $("#dynamic_player_roles").html(rolesHtml);
                }
            });
        });
    </script>
@stop