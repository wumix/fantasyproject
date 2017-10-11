@extends('layouts.app')
@section('title')
    Contact | Gamithonfantasy
    @stop
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-heading">
                    Feedback
                </h1>
                <hr class="light full">
                <div class="page-content" style="margin:0 auto;max-width: 700px;">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6 text-center">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (session('status'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert"
                               aria-label="close">&times;</a> {{ session('status') }}
                        </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('postContact') }}">
                            {{ csrf_field() }}
                            <div class="input-group"  style="margin-bottom: 20px">
                                <span class="input-group-addon signinforminputs">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                                <input type="text" class="form-control signinforminputs1" name="name"
                                       id="name" placeholder="Name" required="">


                            </div>
                            <div class="input-group" style="margin-bottom: 20px">
                                <span class="input-group-addon signinforminputs">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                                <input type="email" class="form-control signinforminputs1"
                                       name="email" id="name" placeholder="Email" required="">


                            </div>
                            <div class="input-group" style="margin-bottom: 20px">
                                <span class="input-group-addon signinforminputs">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                                <input type="subject" class="form-control signinforminputs1"
                                       name="subject" id="name" placeholder="Subject" required="">


                            </div>
                            <textarea type="text" name="message" class="form-control" placeholder="Meassage" required style="height: 150px;"></textarea>
                        <div class="form-group" style="margin-top: 20px;">
                                <input type="submit" class="btn btn-success" value="Submit"/>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                </div>
            </div>
        </div>
    </div>
</section>








@endsection
