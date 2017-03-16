@extends('adminlte::layouts.app')
<?php // dd($tournament_players);?>
@section('htmlheader_title')
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="box">
                 @foreach($tournament_players['tournament_players'] as $row)
                 {{$row['name']}}
                 @endforeach
            </div>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tournament Name: {{$players_list['name']}} ({{$players_list['tournament_game']['name']}})</h3>
                    
                </div>
                <div class="box-body">
                    {!! Form::open(['url' => route('postAddTournamentPlayers'),'files'=>true]) !!}

                    <input type="hidden" name="tournament_id" value="{{$players_list['tournament_game']['id']}}" />
                 
                    @foreach($players_list['tournament_game']['game_players'] as $row)
                    <div class="form-group">
                        <div class="media">
                            <div class="media-left">
                                
                               
                                 <img class="img-md"  src="{{URL::to('uploads/'.$row['profile_pic'])}}" />
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{$row['name']}}</h4>
                                

                                <p><input type="checkbox"  name="player_id[]" value="{{$row['id']}}"/> </p>
                            </div>
                        </div>
                    </div>
                    
                    @endforeach
                    <div class="form-group">
                        <button class="btn btn-success">Add</button>
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