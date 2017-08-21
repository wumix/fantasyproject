@extends('layouts.app')
{{--{{dd($matches->t)}}--}}
@section('title')
    How To Play at Gamithon Fantasy
@stop
@section('css')
    <style>
        .how_play_sec{
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow:0px 0px 27px rgba(0,0,0,0.21);
            padding: 50px 36px;
            margin: 25px 0;
        }
        .scorin_bord_sec{
            width: 100%;
            display: inline-block;
            background: #fff;
            box-shadow:0px 0px 27px rgba(0,0,0,0.21);
            padding:50px 36px 0 36px;
            margin-bottom: 10px;
        }
        .sign_text{
            font-size: 14px;
            color: #333333;
        }
        .sign_text span{
            color: #92b713;
        }
        .sign_up_imp{
            width: 100%;
            display: inline-block;
            text-align: center;
            padding: 15px 0px 55px 0;
        }
        ul{
            padding: 0;
        }
        li{
            list-style: none;
        }

        @media all and (min-width: 100px) and (max-width: 768px) {
            .sign_up_imp img{
                width: 377px;
            }
            .scorin_bord_sec p{
                text-align: justify;
            }
        }
        @media all and (min-width: 100px) and (max-width: 480px) {
            .sign_up_imp img {
                width: 251px;
            }

            .scorin_bord_sec p{
                text-align: justify;
            }
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-heading">
                    Score Card
                </h1>
                <hr class="light full">
            </div>
            <div class="how_play_sec">
                <div class="col-md-12 no-padding">

                </div>

            </div>

        </div>
    </div>

@endsection