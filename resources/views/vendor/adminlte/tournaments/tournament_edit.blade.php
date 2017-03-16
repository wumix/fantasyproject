<?php
//echo '<pre>'; print_r($gameslist);
//echo '<pre>'; print_r($player);die;
//dd($games);
//dd($tournament_games);
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
                    <h3 class="box-title">Tournament Edit</h3>
                    <div class="pull-right">
                        <img class="img-md"  src="{{getUploadsPath($tournament_games['t_logo'])}}" />
                    </div>
                </div>
                <div class="box-body">
                    @include('adminlte::layouts.form_errors')
                    <div class="container-fluid">
                        {!! Form::open(['url' => route('editTournament')]) !!}
                        <div class="form-group">
                            <label>Tournament Name</label>
                            <input type="hidden" name="id" value="{{$tournament_games['id']}}"/>
                            <input required class="form-control" name="name" value="{{$tournament_games['name']}}" type="text" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label>Venue</label>
                            <input required class="form-control" name="venue" value="{{$tournament_games['venue']}}" type="text" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label>Tournament Game</label>
                            <select readonly required id="game_id" name="game_id"  class="custom-select form-control">
                                <option value="">Select</option>
                                @foreach($games as $row)
                                <option 
                                    {!! ($row['name'] == $tournament_games['tournament_game']['name']) ? 'selected' : '' !!} 
                                    value="{{$row['id']}}"
                                    >{{$row['name']}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label>Start Date Time <small class="help">This must be a GMT</small></label>
                            <input required name="start_date" class="datetimepicker form-control"  type="text" value="{{$tournament_games['start_date']}}">
                        </div>
                        <div class="form-group">
                            <label>End Date Time <small class="help">This must be a GMT</small></label>
                            <input required name="end_date" class="datetimepicker form-control"  type="text" value="{{$tournament_games['end_date']}}">
                        </div>
                        <div class="form-group">
                            <label>Max Players</label>
                            <input required name="max_players" class=" form-control"  type="text" value="{{$tournament_games['max_players']}}">
                        </div>

                        <div class="form-group">
                            <label>Profile Picture</label>
                            <input name="t_logo" type="file"/>
                        </div>



                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Game term scores</h3>
                            </div>
                            <div class="panel-body">
                                @foreach($tournament_games['tournament_game']['game_terms'] as $key => $val)


                                <div class="form-group">
                                    <label>{{$val['name']}}</label>
                                    <input type="email" class="form-control" id="email">
                                </div>

                                @endforeach
                            </div>
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

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/datepicker/jquery.datetimepicker.css')}}">
@stop
@section('js')
<script src="{{asset('/datepicker/jquery.datetimepicker.js')}}"></script>
<script src="{{asset('/datepicker/jquery.datatimefull.js')}}"></script>
<script>
$(document).ready(function ($) {
    var datePickerTheme = 'default';
    var dateFormat = 'd.m.y';
    var timeFormat = 'H:i';
    var timeStep = 15;
    //DateTime picker
    $(".datetimepicker").datetimepicker({
        minDate: '0', //yesterday is minimum date(for today use 0 or -1970/01/01)
        // maxDate: '+1970/01/10',
        //step: timeStep,
        //minTime: 0,
        hours12: false,
        theme: datePickerTheme
    });
});
</script>

@stop