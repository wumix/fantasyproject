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
                        <h3 class="box-title">{{$game_types['type_name']}} Stats</h3>
                    </div>
                    <div class="box-body">
                        @include('adminlte::layouts.form_errors')
                        {!! Form::open(['url' => route('postAddGameStat',['game_id'=>$game_id,'game_type'=>$game_type])]) !!}

                        <div class="form-group">
                            <input placeholder="enter stat name i.e wickets runs" name="name" class="form-control"
                                   type="text"/>
                        </div>
                        <div class="form-group">
                            <select name="stat_form" class="custom-select form-control">

                                <option value="bat">Batting</option>
                                <option value="bow">Bowling</option>
                                <option value="bowbat">Fielding and Batting</option>

                            </select>

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        {!! Form::close() !!}

                    </div>
                    <!-- /.box-body -->

                        @foreach($game_types['game_type_stats'] as $key=>$val)
                        <ul class="list-group">

                            <label>{{$val['stat_form']}}</label>
                            <li class="list-group-item">{{$val['name']}}</li>
                        </ul>

                    @endforeach
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
@endsection