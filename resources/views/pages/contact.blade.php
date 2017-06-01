@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-heading">
                    Say Hi!
                </h1>
                <hr class="light full">
                <div class="page-content" style="margin:0 auto;max-width: 700px;">
                    <div class="col-md-12">
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
        </div>
    </div>
</section>








@endsection
