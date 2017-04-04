@extends('layouts.app')

@section('content')

    <!-- .....................Login Form Start............................... -->
    <section>
        <div class="container">
            <div class="row maincontect">
                <div class="text-center col-md-10 col-md-offset-1">
                    <h3 class="lh">
                        CONTACT US
                    </h3>

                </div>
                <div class="main-login main-center">
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
                        <div class="form-group">
                            <label>
                                Name
                            </label>
                            <input name="name" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label>
                                Email
                            </label>
                            <input type="email" name="email" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>
                                Subject
                            </label>
                            <input type="text" name="subject" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label>
                                Message
                            </label>
                            <textarea type="text" name="message" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Submit"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- .....................Login Form End............................... -->


    </section>








@endsection
