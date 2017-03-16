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
                    <h3 class="box-title">Add Tournament</h3>
                </div>
                <div class="box-body">
                    @include('adminlte::layouts.form_errors')
                    {!! Form::open(['url' => route('postAddTournament'),'files'=>true]) !!}
                    <div class="form-group">
                        <label>Name</label>

                        <input required value="{!! old('name') !!}" class="form-control" id="name" placeholder="Add Tournament Name" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>Select Tournament Game</label>
                        <select required id="game_id" name="game_id"  class="custom-select form-control">
                            <option value="">Select</option>
                            <?php $gameid; ?>
                            @foreach($result as $row)
                            <option value="{{$row['id']}}">{{$row['name']}}</option>
                            <?php $gameid = $row['id']; ?>
                            @endforeach
                        </select>

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
                                <label>Venue</label>
                                <input name="venue" class="form-control"  type="text">
                            </div>
                            <div class="form-group">
                                <label>Max Players</label>
                                <input required name="max_players" class="form-control"  type="text">
                            </div>

                            <div class="form-group">
                                <label>Profile Picture</label>
                                <input name="t_logo" type="file"/>
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