@extends('layouts.app')
@section('title')
    Password recovery
@stop
@section('css')
    <style>
        section.content {
            min-height: 100%;
        }

        .page-content {
            position: absolute;
            transform: translate(-50%, 50%);
            top: 50%;
            left: 50%;
            max-width: 700px;
            margin: 0 auto;
        }

        .container .row {
            position: relative;
        }

    </style>

@stop
@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        Reset Password
                    </h1>
                    <hr class="light full">
                    <div class="page-content">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="login-box-body">
                            <div class="col-md-12 no-padding">
                                <p class="help help-block">
                                    Please enter your email, we will send password reset link to you.
                                </p>
                            </div>

                            <form action="{{ url('/password/email') }}" method="post">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group has-feedback">
                                    <input required type="email" class="form-control" placeholder="Email" name="email"
                                           value="{{ old('email') }}"/>
                                </div>

                                <div class="form-group">
                                    <button type="submit"
                                            class="btn btn-primary btn-block btn-flat">
                                        {{ trans('adminlte_lang::message.sendpassword') }}
                                    </button>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ url('/login') }}">Log in</a>
                                </div>
                                <div class="col-md-6 pull-right text-right">
                                    <a href="{{ route('signUp') }}"
                                       class="text-center">{{ trans('adminlte_lang::message.registermember') }}
                                    </a>
                                </div>
                            </div>


                        </div><!-- /.login-box-body -->
                    </div><!-- /.login-box -->
                </div>
            </div>
        </div>
    </section>
@endsection
