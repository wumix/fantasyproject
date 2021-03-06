@extends('adminlte::layouts.app')
{{--{{dd($player)}}--}}
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
                        <h3 class="box-title">Add {{$player['name']}} Statss</h3>
                    </div>
                    <div class="box-body">
                        @include('adminlte::layouts.form_errors')
                        {!! Form::open(['url' => route('postPlayerStats',['player_id'=>$player['id']]),'files'=>true]) !!}
                        <?php $i=0;?>
                        @foreach($player['player_games']['game_type'] as $row)

                            @if(!empty($row['game_type_stats_category']))
                                <label><strong>{{$row['type_name']}}</strong><br></label>

                                @foreach($row['game_type_stats_category'] as $row1)
                                    {{$row1['name']}}
                                    @foreach($row1['game_type_stats'] as $row2 )

                                    <?php
                                        $playerpoints=0;
                                        if(!empty($row2['player'])){
                                            $playerpoints=$row2['player'][0]['pivot']['stat_points'];
                                        }



                                    ?>

                                        <div class="form-group">
                                            <label>{{$row2['name']}}</label>

                                            <input type="hidden" class="form-control" name="stats[{{$i}}][id]"
                                                   placeholder="{{$row2['id']}}" value="{{$row2['id']}}"/>
                                            <input required class="form-control" name="stats[{{$i}}][name]"
                                                   value="{{$playerpoints}}"/>

                                        </div>
                                        <?php $i++?>
                                    @endforeach
                                @endforeach
                            @endif
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