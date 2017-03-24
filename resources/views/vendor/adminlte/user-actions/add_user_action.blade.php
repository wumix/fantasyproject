@extends('adminlte::layouts.app')

@section('htmlheader_title')

@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="box">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>
                                Action Name
                            </td>
                            <td>
                                Action Key
                            </td>

                            <td colspan="2" class="text-center">
                                Actions
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($actions_list as $row)
                        <tr>
                            <td>{{$row['action_name']}}</td>
                            <td>{{$row['action_key']}}</td>
                            <td>
                                <a href="{{route('editAction',['action_id'=>$row['id']])}}" class="btn btn-warning">
                                    Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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