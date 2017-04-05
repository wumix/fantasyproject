@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-heading">
                    Edit your profile
                </h1>
                <hr class="light full">
                <div class="page-content col-md-12">
                    {!! Form::open(['url' => route('postUserProfile'),'files' => true]) !!}
                    {{--<form class="form-horizontal" role="form" method="POST" action="{{ route('postUserProfile') }}">--}}
                        {{ csrf_field() }}

                        <div class="form-group" id="sformbox">
                            <div class="cols-md-12" id="withbox">
                                <div class="input-group">

                                    <img class="img-thumbnail" style="width: 100px;" src="{{getUploadsPath(Auth::user()->profile_pic)}}" />    
                                    <br/>
                                    <input name="profile_pic" class="mt10" type="file" />

                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="sformbox">
                            <div class="cols-md-12" id="withbox">
                                <div class="input-group">
                                    <span id="fbg" class="input-group-addon">
                                        <i id="lgfico" class="fa fa-user fa-lg" aria-hidden="true"></i>
                                    </span>
                                    <input value="{{$userprofileinfo['name']}}" id="fullname" 
                                           type="text" 
                                           class="form-control" name="name" placeholder="{{$userprofileinfo['name']}}"
                                           >
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
                                    <input disabled value="{{Auth::user()->email}}" type="email" class="form-control"placeholder="{{$userprofileinfo['email']}}" />
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
                                           name="password">
                                </div>
                                <span class="help-block">
                                    Enter your password if you want to change yuor current password.
                                </span>

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
                                           placeholder="Retype Password" name="password_confirmation">
                                </div>
                            </div>
                        </div>
                        <div class="form-group " id="withbox">
                            <button type="submit" class="btn  btn-success">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- .....................Login Form Start............................... -->
@endsection
