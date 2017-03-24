@extends('adminlte::layouts.app')
<?php //dd($user_action);?>
@section('htmlheader_title')

@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add User Actions</h3>
                </div>
                <div class="box-body">
                    @include('adminlte::layouts.form_errors')
                    {!! Form::open(['url' => route('postEditAction',['action_id'=>$user_action['id']]),'files' => true])
                    !!}
                    <div class="form-group">
                        <label>
                            Action Name
                        </label>
                        <input required type="text" value="{{$actionInfo['action_name']}}" class="form-control"
                               name="action_name" readonly />
                    </div>

                    <div class="form-group">
                        <label>
                            Action Key
                        </label>
                        <input required type="text" value="{{$actionInfo['action_key']}}" readonly class="form-control" name="action_key"/>
                    </div>
                    <div class="form-group">
                        <label>
                            Description
                        </label>
                        <textarea required class="form-control" name="action_desc">{{$user_action['action_desc']}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>
                            Action Points
                        </label>
                        <input required type="text" value="{{$user_action['action_points']}}" class="form-control"
                               name="action_points"/>
                    </div>
                    <div class="form-group">

                        <button class="btn btn-success">Update</button>
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