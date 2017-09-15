@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Membership
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Membership</h3>
                    </div>
                    <div class="box-body">
                        @include('adminlte::layouts.form_errors')
                        {!! Form::open(['url' => route('postAddMembership')]) !!}
                        <div class="form-group">
                            <label>Name</label>
                            <input required value="{!! old('name') !!}" class="form-control" id="name"
                                   placeholder="Enter Membership Name" type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input required value="{!! old('name') !!}" class="form-control" id="name"
                                   placeholder="Enter Membership Name" type="text" name="price">
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
@section('js')

@stop