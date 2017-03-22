@extends('adminlte::layouts.app')
<?php // dd($result);?>
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
                    <h3 class="box-title">Add Match</h3>
                </div>
                <div class="box-body">
                    @include('adminlte::layouts.form_errors')
                    {!! Form::open(['url' => route('postAddMatch'),'files'=>true]) !!}
                    <div class="form-group">
                        <label>Name</label>
                        <input required value="{!! old('name') !!}" class="form-control" id="name"
                               placeholder="Enter Match Name" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>Select Match Tournament</label>
                        <select id="game_id" name="tournament_id" class="custom-select form-control">
                            <option value="">Select</option>

                            @foreach($result as $row)
                            <option value="{{$row['id']}}">{{$row['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Team One</label>
                        <input required value="{!! old('name') !!}" class="form-control" id="name"
                               placeholder="Enter First Team Name" type="text" name="team_one">
                    </div>
                    <div class="form-group">
                        <label>Team Two</label>
                        <input required value="{!! old('name') !!}" class="form-control" id="name"
                               placeholder="Enter Second Team Name" type="text" name="team_two">
                    </div>
                    <div class="form-group">
                        <label>Venue</label>
                        <input required value="{!! old('name') !!}" class="form-control" id="name"
                               placeholder="Venue Name" type="text" name="venue">
                    </div>
                    <div class="form-group">
                        <label>Start Date Time <small class="help">(This must be a GMT)</small>
                        <input name="start_date" class="datetimepicker form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>End Date Time <small class="help">(This must be a GMT)</small></label>
                        <input name="end_date" class="datetimepicker form-control" type="text">
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add</button>
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