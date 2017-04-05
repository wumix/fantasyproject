@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-heading">
                    Login
                </h1>
                <hr class="light full">
                <div class="page-content">
                    <div class="form-container">
                                            <div class="text-center col-md-12 col">
                        <div class="gbtn">
                            <a href="{{route('facebookLogin')}}" class="btn btn-fb-login">
                                Login with Facebook
                            </a>
                        </div>
                        <div class="lines mt26">
                            <h4 class="linor">OR</h4>
                        </div>
                    </div>
                    <!--Form-->
                    <div class="col-md-12">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            </div>
                            <div class="form-group" id="formbox">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif

                                <div class="cols-md-12" id="withbox">
                                    <div class="input-group">
                                        <span id="fbg" class="input-group-addon"><i id="lgfico" class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="email" id="email"  placeholder="Email" required autofocus/>


                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif


                            <div class="form-group">
                                <div class="cols-md-10"  id="withbox">
                                    <div class="input-group">
                                        <span id="fbg" class="input-group-addon"><i id="lgfico" class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password" id="password"  placeholder="Password"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 no-padding">
                                <div class="form-group " id="withbox">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input"/>
                                        <span  id="remberbox"> Rember Me</span> 
<!--                                        <a href="{{ route('password.request') }}" id="forgetlink"> Forget Your Password?</a>-->
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 no-padding text-right">
                                <div class="form-group " id="withbox">
                                    <a class="signuplink" href="{{ route('signUp') }}">Sign up for new account</a>
                                </div>
                            </div>
                            <div class="form-group no-padding">
                                <button type="submit" class="btn btn-block btn-lg btn-green">Login</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
