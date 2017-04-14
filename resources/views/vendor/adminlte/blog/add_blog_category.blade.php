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
                        <h3 class="box-title">Add</h3>
                    </div>
                    <div class="box-body">
                        @include('adminlte::layouts.form_errors')
                        {!! Form::open(['url' => route('postAddBlogCategory'),'files'=>true]) !!}
                        <div class="form-group">
                            <label>Name</label>

                            <input required value="{!! old('name') !!}" class="form-control" id="name"
                                   placeholder="Add Category Name" type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label>Select Tournament Game</label>
                            <textarea name="description" class="form-control" type="description"></textarea>
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
