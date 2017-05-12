@extends('adminlte::layouts.app')
{{--{{dd($teams)}}--}}
@section('htmlheader_title')

@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Team</h3>
                    </div>
                    <div class="box-body">
                        @include('adminlte::layouts.form_errors')
                        {!! Form::open(['url' => route('addTeamToMatchPost',['match_id'=>$matchid,'tournament_id'=>$tournament_id])]) !!}

                        @foreach($teams as $row)
                        <div class="form-group">


                            <input type="checkbox"
                                   name="teams_id[]" value="{{$row['id']}}">{{$row['name']}}

                        </div>
                        @endforeach



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
