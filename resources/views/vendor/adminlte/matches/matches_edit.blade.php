<?php
//echo '<pre>'; print_r($gameslist);
//echo '<pre>'; print_r($match);die;
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
                        <h3 class="box-title">Edit MATCH
                            <small>{{$match['name']}}</small>
                        </h3>
                    </div>
                    <div class="box-body">
                        @include('adminlte::layouts.form_errors')
                        <div class="container-fluid">
                            {!! Form::open(['url' => route('editMatch',['match_id'=>$match['id']]),'files' => true]) !!}
                            <div class="form-group">
                                <label>Match Name</label>
                                <input  class="form-control" name="name" value="{{$match['name']}}" type="text"
                                        placeholder=""/>
                            </div>
                            <div class="form-group">
                                <label>Change Tournament</label>
                                <select id="tournament_id" name="tournament_id" class="custom-select form-control">
                                    <option value="">Select</option>

                                    @foreach($tournamentlist as $row)
                                        <option
                                            <?php echo ($row['name'] == $match['match_tournament']['name']) ? 'selected' : '' ?>
                                            value="{{$row['id']}}">{{$row['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Start Date Time
                                    <small class="help">(This must be a GMT)</small>
                                    <input name="start_date" value="{{$match['start_date']}}"
                                           class="datetimepicker form-control" type="text"/>
                            </div>
                            <div class="form-group">
                                <label>End Date Time
                                    <small class="help">(This must be a GMT)</small>
                                </label>
                                <input name="end_date" value="{{$match['end_date']}}"
                                       class="datetimepicker form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label>venue
                                    <small class="help">(This must be a GMT)</small>
                                </label>
                                <input name="venue" value="{{$match['venue']}}" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label>Team One</label>
                                <select required id="game_id" name="team_one" class="custom-select form-control">
                                    <option value="">Select</option>

                                    @foreach($tournamentTeams as $team)
                                        <option <?php echo ($match['team_one'] == $team['name']) ? 'selected' : '' ?>
                                                value="{{$team['name']}}">{{$team['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Team two</label>
                                <select required id="game_id" name="team_two" class="custom-select form-control">
                                    <option value="">Select</option>

                                    @foreach($tournamentTeams as $team)
                                        <option <?php echo ($match['team_two'] == $team['name']) ? 'selected' : '' ?>
                                                value="{{$team['name']}}">{{$team['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Team 1 Logo</label>
                                <input  name="team_1_logo" type="file"/>
                                <img src="{{getUploadsPath($match['team_1_logo'])}}">
                            </div>
                            <div class="form-group">
                                <label>Team 2 logo</label>
                                <input  name="team_2_logo" type="file"/>
                                <img src="{{getUploadsPath($match['team_2_logo'])}}">
                            </div>
                            <div class="form-group">
                                <label>Result</label>
                                <?php
                                if(empty($match['result'])){
                                    $match['result']="To Be Decided";
                                }


                                ?>
                                <input  class="form-control" name="result" value="{{$match['result']}}"
                                        type="text" placeholder=""/>
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