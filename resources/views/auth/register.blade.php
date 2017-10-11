@extends('layouts.app')
@section('title')
    Register
@stop
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        Get Registered For Free
                    </h1>
                    <hr class="light full">
                    <div class="page-content">
                        <div class="">
                            <!--Form-->
                            <div class="col-md-12">
                                <div class="col-md-4 col-md-4 col-sm-offset-4">
                                    <div class="=col-md-12  col text-center">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @else
                                            <div class="gbtn">
                                                <a href="{{route('facebookLogin')}}" class="btn btn-fb-login">
                                                    Signup Using Facebook
                                                </a>
                                            </div>
                                            <div class="lines mt26">
                                                <h4 class="linor">OR</h4>
                                            </div>
                                        @endif
                                    </div>
                                    <form class="form-horizontal" role="form" method="POST"
                                          action="{{ route('register') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="referral_key" value="{{$referral_key}}"/>

                                        <div class="form-group" id="sformbox">
                                            <div class="cols-md-12" id="withbox">
                                                <div class="input-group">
                                            <span id="fbg" class="signinforminputs input-group-addon">
                                                <i id="lgfico" class="fa fa-user fa-lg" aria-hidden="true"></i>
                                            </span>
                                                    <input id="fullname" type="text"
                                                           class="signinforminputs1 form-control"
                                                           name="name" placeholder="Name"
                                                           required autofocus>
                                                </div>

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                                @endif

                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"
                                             id="sformbox">

                                            <div class="cols-md-12" id="withbox">
                                                <div class="input-group">
                                            <span id="fbg" class="signinforminputs input-group-addon"><i id="lgfico"
                                                                                                         class="fa fa-envelope fa-lg"
                                                                                                         aria-hidden="true"></i></span>
                                                    <input id="email" type="email"
                                                           class="signinforminputs1 form-control"
                                                           name="email" placeholder="Email"
                                                           required>


                                                </div>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                                @endif

                                            </div>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                        @endif


                                        <div class="form-group">


                                            <div class="cols-md-10" id="withbox">
                                                <div class="input-group">
                                            <span id="fbg" class="signinforminputs input-group-addon"><i id="lgfico"
                                                                                                         class="fa fa-key fa-lg"
                                                                                                         aria-hidden="true"></i></span>
                                                    <input id="password" type="password"
                                                           class="signinforminputs1 form-control" placeholder="Password"
                                                           name="password" required>
                                                </div>

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                                @endif

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
                                            <span id="fbg" class="signinforminputs input-group-addon"><i id="lgfico"
                                                                                                         class="fa fa-key fa-lg"
                                                                                                         aria-hidden="true"></i></span>
                                                    <input id="retypepassword" type="password"
                                                           class="signinforminputs1 form-control"
                                                           placeholder="Retype Password" name="password_confirmation"
                                                           required>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6 no-padding">
                                            <div class="form-group " id="withbox">
                                                <label class="form-check-label">
                                                    <input required type="checkbox" name="terms"
                                                           class="form-check-input"/>
                                                    <span id="remberbox"> I agree with <a target="_blank"
                                                                                          href="{{route('PrivacyPolicy')}}"
                                                                                          style="color:#92b712">Terms and conditions.</a> </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 no-padding text-right">
                                            <div class="form-group " id="withbox">
                                                <a class="signuplink" href="/login">
                                                    Login to your account
                                                </a>
                                            </div>
                                        </div>

                                        <div class="form-group " id="withbox">
                                            <button type="submit" class="btn btn-block btn-lg btn-green">Sign Up
                                            </button>
                                        </div>


                                    </form>
                                </div>
                                {{--<div class="col-md-8 pull-right">--}}
                                    {{--@include('user.memberships.member_popup')--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@section('facbook-og-tags')
    <meta property="og:url" content="{{URL::to('/')}}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="Gamithon Fantasy"/>
    <meta property="og:description" content="Join referral here"/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="600"/>
    <meta property="og:image" content="{{URL::to('/img/fb_share_logo.png')}}"/>
    <meta property="fb:app_id" content="337419313358697"/>
@stop
