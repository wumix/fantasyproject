@extends('adminlte::layouts.app')

@section('htmlheader_title')
Users
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add User</h3>
                </div>
                <div class="box-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
                    </div>
                    @endif
                    {!! Form::open(['url' => route('postAddUser'),'files'=>true]) !!}
                    
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="{{ trans('adminlte_lang::message.fullname') }}" name="name" value="{{ old('name') }}"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    @if (config('user','email') === 'username')
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="{{ trans('adminlte_lang::message.username') }}" name="username"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    @endif

                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email" value="{{ old('email') }}"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.retrypepassword') }}" name="password_confirmation"/>
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                    <div class="form-group">

                        <label>Profile Picture</label>
                        <input name="profile_pic" type="file"/>

                    </div>
                    <div class="row">
                        <div class="col-xs-1">
                            <label>
                                <div class="checkbox_register icheck">
                                    <label>
                                        <input type="checkbox" name="terms">
                                    </label>
                                </div>
                            </label>
                        </div><!-- /.col -->
                        <div class="col-xs-6">
                            <div class="form-group">
                                <button type="button" class="btn btn-block btn-flat" data-toggle="modal" data-target="#termsModal">{{ trans('adminlte_lang::message.terms') }}</button>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4 col-xs-push-1">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.register') }}</button>
                        </div><!-- /.col -->
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