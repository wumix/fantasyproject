@extends('layouts.app')
@section('content')
    <!-- ...............................News start......................... -->
    <div class="container">
        <div class="row">
            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="gallery-title">LOGIN FORM</h3>
            </div>


            <div class=" col-md-12">
                <div class="login-box">
                    <div class="login-logo">
                        <a href="{{ url('/home') }}"><b>Admin</b>LTE</a>
                    </div><!-- /.login-logo -->

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

                    <div class="login-box-body">
                        <p class="login-box-msg"> {{ trans('adminlte_lang::message.siginsession') }} </p>



                        <form action="{{ url('/login') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <login-input-field
                                    name="{{ config('user','email') }}"
                                    domain="{{ config('auth.defaults.domain','') }}"
                            ></login-input-field>
                            <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.<') }}" name="email"/>
                           <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                           </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="checkbox icheck">
                                        <label>
                                            <input style="display:none;" type="checkbox" name="remember"> {{ trans('adminlte_lang::message.remember') }}
                                        </label>
                                    </div>
                                </div><!-- /.col -->
                                <div class="col-xs-4">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.buttonsign') }}</button>
                                </div><!-- /.col -->
                            </div>
                        </form>

                        @include('adminlte::auth.partials.social_login')

                        <a href="{{ url('/password/reset') }}">{{ trans('adminlte_lang::message.forgotpassword') }}</a><br>
                        <a href="{{ url('/register') }}" class="text-center">{{ trans('adminlte_lang::message.registermember') }}</a>

                    </div><!-- /.login-box-body -->

                </div>
            </div>
        </div>
    </div>
    </section>

    <!-- /.....................footer Start......................../ -->
@endsection
