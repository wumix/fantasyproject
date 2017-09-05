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
                        <select id="tournament_id" name="tournament_id" class="custom-select form-control">
                            <option value="">Select</option>

                            @foreach($result as $row)
                            <option value="{{$row['id']}}">{{$row['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Team One</label>
                        <select required id="team_one" name="team_one" class="custom-select form-control">
                            <option value="">Select</option>

                            @foreach($row['teams'] as $team)
                            <option value="{{$team['name']}}">{{$team['name']}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label>Team Two</label>
                        <select required id="team_two" name="team_two" class="custom-select form-control">
                            <option value="">Select</option>

                            @foreach($row['teams'] as $team)
                            <option value="{{$team['name']}}">{{$team['name']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Venue</label>
                        <input required value="{!! old('name') !!}" class="form-control" id="name"
                               placeholder="Venue Name" type="text" name="venue">
                    </div>
                    <div class="form-group">
                        <label>Start Date Time
                            <small class="help">(This must be a GMT)</small>
                        </label>
                        <input required name="start_date" class="datetimepicker form-control" type="text">
                    </div>

                    <div class="form-group">
                        <label>End Date Time
                            <small class="help">(This must be a GMT)</small>
                        </label>
                        <input required name="end_date" class="datetimepicker form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Team 1 Logo</label>
                        <input  name="team_1_logo" type="file"/>
                    </div>
                    <div class="form-group">
                        <label>Team 2 logo</label>
                        <input  name="team_2_logo" type="file"/>
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
<script>
    $('#tournament_id').on('change', function () {

        $.ajax({
            type: 'POST',
            url: '{{route('tournamnetTeams')}}',
            data: {
                tournament_id: $(this).val(),
                _token: '{{ csrf_token() }}'
            },
            success: function (data) {
                var $el = $("#team_one");
                var $el1 = $("#team_two");

                var ddCity = '<option value="">Select Team</option>';
                $.each(data, function (k, v) {

                    ddCity += '<option value="' + v.name + '">' + v.name + '</option>'
                });
                $el.html(ddCity);
                $el1.html(ddCity);
                $("#team_one").attr('disabled', false);
            }
        });
    });

</script>

@stop