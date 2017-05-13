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
                        <h3 class="box-title">Ad Game Format</h3>
                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => route('postAddGameFormat',['game_id'=>$game_id])]) !!}
                        <div class="form-group">
                            <label>Name</label>
                            <input required value="{!! old('name') !!}" class="form-control" id="name"
                                   placeholder="Enter Game Name" type="text" name="name">
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        {!! Form::close() !!}

                         <label></label>



                            <ul class="list-group">
                            @foreach($game_types as $row)
                                    <li class="list-group-item">{{$row['type_name']}}</li>


                            @endforeach
                            </ul>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
@endsection