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
                        <h3 class="box-title">Add Game Stat Name</h3>
                    </div>
                    <div class="box-body">
                        @include('adminlte::layouts.form_errors')
                        {!! Form::open(['url' => route('postAddGameStat',['game_id'=>$game_id,'game_type'=>$game_type])]) !!}

                        <div class="form-group">
                            <input placeholder="enter stat name i.e wickets runs" name="name" class="form-control" type="text"/>
                        </div>
                        <div class="form-group">
                            <select name="stat_form" class="custom-select form-control">

                                    <option value="Batting">Batting</option>
                                <option value="Batting">Bowling</option>
                                <option value="Batting">Fielding</option>

                            </select>

                        </div>
                        <div class="box-footer">
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