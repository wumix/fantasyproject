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
                        <h3 class="box-title">Chose Type</h3>
                    </div>
                    <div class="box-body">

                        {!! Form::open(['url' => route('showGameAddStatForm',['game_id'=>$game_id]),'method'=>'get','files'=>true]) !!}



                        <div class="form-group">
                            <select name="game_type" class="custom-select form-control">
                                @foreach($game_types as $row)
                                    <option value="{{$row['id']}}">{{$row['type_name']}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="box-footer">
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