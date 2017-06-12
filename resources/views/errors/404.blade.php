@extends('layouts.app')
{{--{{dd($matches->t)}}--}}
@section('title')
    Page not found
@stop
@section('content')
    <style>
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-heading text-center" style="font-size: 300px;">
                    404
                </h1>
            </div>
        </div>
    </div>
@endsection