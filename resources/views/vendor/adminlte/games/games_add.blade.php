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
                    <h3 class="box-title">Add Game</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['url' => route('postAddGame')]) !!}
                    <div class="form-group">
                            <label>Name</label>
                            <input required value="{!! old('name') !!}" class="form-control" id="name" placeholder="Enter Player Name" type="text" name="name">
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