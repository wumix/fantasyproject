@extends('layouts.app')

@section('title')
    Login
@stop
@section('css')
    <style>
        .help-block{
            color:red;
        }
@media screen and (min-width: 320px) and (max-width: 480px) {
    #hide-reg-on-mob {
        display: none !important;
    }
}
    </style>
    @stop
@section('content')

    <section>
        <div class="container login-top-margin">
            <div class="row login-main-form">
                <div class="col-lg-6 text-center">
                    <span class="align-middle">Login</span>
                </div>
                <div class="col-lg-6 text-center">
                    <span id="hide-reg-on-mob" class="align-middle">Register</span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-content">
                        <div class="form-container">
                            <div class="col-lg-12">
                                <div class="text-center col-lg-12">
                                    <div class="gbtn">
                                        <a href="{{route('facebookLogin',['referral_key'=>''])}}" class="btn btn-fb-login">
                                            Login with Facebook
                                        </a>
                                    </div>
                                    <div class="lines">
                                        <hr class="lgline">
                                        <h4 class="linor">OR</h4>
                                        <hr class="lgline">
                                    </div>
                                </div>
                                <!--Form-->

                                <div class="col-lg-10 col-lg-offset-1">
                                    <form class="form-horizontal" role="form" method="POST"
                                          action="{{ route('login') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        </div>
                                        <div class="form-group" id="formbox">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif

                                            <div class="cols-lg-12" id="withbox">
                                                <div class="input-group">
                                                    <span class="input-group-addon signinforminputs"><i id="lgfico"
                                                                                                        class="fa fa-envelope fa"
                                                                                                        aria-hidden="true"></i></span>
                                                    <input type="text" class="form-control signinforminputs1"
                                                           name="email" id="email" placeholder="Email" required/>


                                                </div>
                                            </div>
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                        @endif


                                        <div class="form-group">
                                            <div class="cols-lg-10" id="withbox">
                                                <div class="input-group">
                                                    <span class="input-group-addon signinforminputs"><i id="lgfico"
                                                                                                        class="fa fa-key"
                                                                                                        aria-hidden="true"></i></span>
                                                    <input type="password" class="form-control signinforminputs1"
                                                           name="password" id="password" placeholder="Password"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 signiinlink">
                                            <div class="form-group " id="withbox">
                                                <label class="form-check-label">
                                                    <input name="remember" type="checkbox" class="form-check-input"/>
                                                    <span id="remberbox"> Rember Me</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 signuplink">
                                            <label class="pull-right">
                                                <a href="{{ route('password.request') }}" id="forgetlink"> Forget Your Password?</a>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-green btn-lg ">Sign In</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="jumbotron" style="background:#3b4034;">
                        <h4 style="color: #ffbd16">Don't Have a Gamithon Fantasy Account</h4>
                        <h5 style="color: #ffffff;padding-top: 18px;">In that case, you are missing out on:</h5>

                        <ul style="color:#ffffff;list-style: none outside none; padding-top: 5px">
                            <li>Gamithon Fantasy League For Games</li>
                            <li>Exclusive fan services</li>
                            <li>Customised site content</li>

                            <li>Favorite Game information and notifications</li>


                        </ul>

                        <p style="padding-top: 10px;">
                            <a class="btn btn-block btn-lg btn-register" href="{{route('signUp')}}" role="button">Register</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br>
    </section>

@endsection
