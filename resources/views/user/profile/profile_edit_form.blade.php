@extends('layouts.app')

@section('content')
    <section class="loginc">
        <div class="text-center col-md-10 col-md-offset-1">
            <h3 class="slh">Edit Profile Page</h3>

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
									<i id="lgfico" class="fa fa-user fa-lg" aria-hidden="true"></i>
									</span>
                                    <input id="fullname" type="text" class="form-control" name="name" placeholder="{{$userprofileinfo['name']}}"
                                            autofocus>
                                </div>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" id="sformbox">

                            <div class="cols-md-12" id="withbox">
                                <div class="input-group">
                                    <span id="fbg" class="input-group-addon"><i id="lgfico" class="fa fa-envelope fa-lg"
                                                                                aria-hidden="true"></i></span>
                                    <input id="email" type="email" class="form-control" name="email" placeholder="{{$userprofileinfo['email']}}"
                                           >


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
                                    <span id="fbg" class="input-group-addon"><i id="lgfico" class="fa fa-key fa-lg"
                                                                                aria-hidden="true"></i></span>
                                    <input id="password" type="password" class="form-control" placeholder="Password"
                                           name="old-password">
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
                                    <span id="fbg" class="input-group-addon"><i id="lgfico" class="fa fa-key fa-lg"
                                                                                aria-hidden="true"></i></span>
                                    <input id="retypepassword" type="password" class="form-control"
                                           placeholder="Retype Password" name="password_new">
                                </div>
                            </div>
                        </div>
                        {{--asdasd--}}


                        <div class="form-group " id="withbox">

                            <button type="submit" class="btn  btn-success">Save Changes</button>
                        </div>


                        {{--asdasda--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-lg-1">--}}
                        {{--<div class="input-group">--}}
                        {{--<input type="checkbox" aria-label="Checkbox for following text input"/>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-5">--}}
                        {{--<div class="form-group">--}}
                        {{--<label>I Agree</label>--}}
                        {{--</div>--}}

                        {{--</div>--}}
                        {{--<div class="col-lg-5">--}}
                        {{--<div class="form-group">--}}
                        {{--<button type="submit" class="btn btn-success">REGISTER</button>--}}
                        {{--</div>--}}

                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                        {{--<input id="terms" type="checkbox" name="terms" required class="form-check-input">--}}
                        {{--<label>--}}
                        {{--I agree--}}

                        {{--</label>--}}

                        {{--<a href="" id="termlink"> Terms of Service Privacy Policy</a>--}}
                        {{--</div>--}}


                    </form>
                </div>
            </div>
        </div>
        <!-- .....................Login Form End............................... -->


    </section>




@endsection
