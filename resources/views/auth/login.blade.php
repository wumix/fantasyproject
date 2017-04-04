@extends('layouts.app')

@section('content')
<section class="loginc">
    <div class="text-center col-md-10 col-md-offset-1">
        <h3 class="lh">LOGIN WITH</h3>
        <div class="gbtn">
            <a id="fb" href="{{route('facebookLogin')}}" class="btn btn-sm">Login with Facebook</a>
<!--            <button id="tw" class="btn btn-sm">Login with Twitter</button>
            <button id="googleb" class="btn btn-sm">Login with Google+</button>-->
        </div>
        <div class="lines">
            <hr class="lgline"><h4 class="linor">OR</h4><hr class="lgline">
        </div>
    </div>
</section>
<!-- .....................Login Form Start............................... -->
<section>
    <div class="container">
        <div class="row main">

            <div class="main-login main-center">

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

                    <div class="form-group " id="withbox">
                        <label class="form-check-label">

                            <input type="checkbox" class="form-check-input"/>
                            <span  id="remberbox"> Rember Me</span> <a href="{{ route('password.request') }}" id="forgetlink"> Forget Your Password?</a>
                        </label>
                    </div>
                    <div class="form-group " id="withbox">
                        <a class="signuplink" href="{{ route('signUp') }}">Sign up for new account</a>
                        <button type="submit" class="btn  btn-lg btn-block login-button">LOGIN</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
    <!-- .....................Login Form End............................... -->


</section>








@endsection
