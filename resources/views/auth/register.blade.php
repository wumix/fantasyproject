@extends('layouts.app')

@section('content')
    <section class="loginc">
        <div class="text-center col-md-10 col-md-offset-1">
            <h3 class="slh">SIGN UP FORM</h3>

            <hr class="signupline">
        </div>
    </section>
    <!-- .....................Login Form Start............................... -->
    <section>
        <div class="container">
            <div class="row smain">

                <div class="main-login main-center">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"></div>

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group" id="sformbox">

                            <div class="cols-md-12" id="withbox">
                                <div class="input-group">
									<span id="fbg" class="input-group-addon">
									<i id="lgfico"  class="fa fa-user fa-lg" aria-hidden="true"></i>
									</span>
                                    <input id="fullname" type="text" class="form-control" name="name" placeholder="Name" required autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" id="sformbox">

                            <div class="cols-md-12" id="withbox">
                                <div class="input-group">
                                    <span id="fbg" class="input-group-addon"><i id="lgfico" class="fa fa-envelope fa-lg" aria-hidden="true"></i></span>
                                    <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>

                                </div>
                            </div>
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif


                        <div class="form-group">

                            <div class="cols-md-10"  id="withbox">
                                <div class="input-group">
                                    <span id="fbg" class="input-group-addon"><i id="lgfico" class="fa fa-key fa-lg" aria-hidden="true"></i></span>
                                    <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                        <div class="form-group" id="sformbox">

                            <div class="cols-md-12" id="withbox">
                                <div class="input-group">
                                    <span id="fbg" class="input-group-addon"><i id="lgfico" class="fa fa-key fa-lg" aria-hidden="true"></i></span>
                                    <input id="retypepassword" type="password" class="form-control" placeholder="Retype Password" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group " id="withbox">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                <span  id="remberbox"> I agreeto Gamithon's</span> <a href="" id="termlink"> Terms of Service Privacy Policy</a>
                            </label>
                        </div>

                        <div class="form-group " id="withbox">
                            <a class="signuplink" href="">Already have an account</a>
                            <button type="submit" class="btn  btn-lg btn-block login-button">REGISTER</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- .....................Login Form End............................... -->


    </section>



{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Register</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                            {{--<label for="name" class="col-md-4 control-label">Name</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>--}}

                                {{--@if ($errors->has('name'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Register--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
