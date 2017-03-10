@extends('adminlte::layouts.app')
@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Clients</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <div align="center" style="color:red;">
                        @if(session('message'))
                        <h4>{{session('message')}}</h4>
                        @endif
                    </div>
                    {!! Form::open(['url' => route('postAddPlayer')]) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input required value="{!! old('name') !!}" class="form-control" id="name" placeholder="Add Games name" type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class='form-control' required placeholder='Email Address'/>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input required type="password" name="password" id="password1" class='form-control' required placeholder='Password'/>
                        </div>
                        <div class="form-group">
                            <label>Retype Password</label>
                            <input required class="form-control" type='password' placeholder="Retype Password" name="password2" id='password2' equalTo='#password1'>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('js/validation/jquery.validate.min.js') !!}
{!! Html::script('js/app.js') !!}
<script type="text/javascript">
    $("#add-client-form").validate();
</script>
@endsection