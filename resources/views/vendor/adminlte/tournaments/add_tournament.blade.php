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
                    <h3 class="box-title">Add Tournament</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['url' => route('postAddTournament'),'files'=>true]) !!}
                    <div class="form-group">
                        <label>Name</label>

                        <input required value="{!! old('name') !!}" class="form-control" id="name" placeholder="Add Tournament Name" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>Select Tournament Game</label>
                        <select id="game_id" name="game_id"  class="custom-select form-control">
                            <option value="">Select</option>
                            <?php $gameid; ?>
                            @foreach($result as $row)
                            <option value="{{$row['id']}}">{{$row['name']}}</option>
                            <?php $gameid = $row['id']; ?>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <input class="datetimepicker"  type="text" value="2014/03/15 05:06">
                    </div>
                    <div class="form-group">
                        <label>Tournament Logo</label>
                        <input type="file"/>
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
<link rel="stylesheet" type="text/css" href="{{asset('js/datepicker/jquery.datetimepicker.css')}}">
@stop
@section('js')

<script>
    jQuery(document).ready(function ($) {
        var datePickerTheme = 'dark';
        var dateFormat = 'd.m.y';
        var timeFormat = 'H:i';
        var timeStep = 15;
        //DateTime picker
        $(".datetimepicker").datetimepicker({
            minDate: '0', //yesterday is minimum date(for today use 0 or -1970/01/01)
            maxDate: '+1970/01/10',
            step: timeStep,
            minTime: 0,
            hours12: false,
            theme: datePickerTheme
        });
    });
</script>

@stop