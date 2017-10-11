@extends('layouts.app')
{{--{{dd($matches->t)}}--}}
@section('title')
    How To Play at Gamithon Fantasy
@stop
@section('meta-keywords')

<meta name="description" content="It's a skill-based game that makes you experience the thrill. You will have to select a team of 11 players all over the world. Winners get exciting cash prizes!">
@endsection

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
            font-size: 16px;
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
                    How To Play
                </h1>
                <hr class="light full">
            </div>
            <div class="how_play_sec">
                <div class="col-md-12 no-padding">
                    <ul>
                        <li>
                            <div class="sign_text">1. <a href="{{route('signUp')}}">Sign up</a> for an account</div>
                            <span class="sign_up_imp"><img src="{{URL::to('/img/sign-up_imp.png')}}" alt=""/></span>
                        </li>
                        <li>

                            <div class="sign_text">2. Go for <a href="{{route('usertournamenthome')}}">Create The Team</a></div>
                            <span class="sign_up_imp"><img src="{{URL::to('/img/sign-up_imp2.png')}}" alt=""/></span>
                        </li>
                        <li>
                            <div class="sign_text">3. Create your own Fantasy team with your Favorite Players in the tournament</div>
                            <span class="sign_up_imp"><img src="{{URL::to('/img/sign-up_imp3.png')}}" alt=""/></span>
                        </li>
                        <li>
                            <div class="sign_text">4. Every new user earns free 100,000 points</div>
                            <span class="sign_up_imp"><img src="{{URL::to('/img/sign-up_imp4.png')}}" alt=""/></span>
                        </li>
                        <li>
                            <div class="sign_text">5. Catch your points when your players score runs, take wickets, etc</div>
                            <span class="sign_up_imp"><img src="{{URL::to('/img/sign-up_imp5.png')}}" alt=""/></span>
                        </li>
                        <li>
                            <div class="sign_text">6. You can win exciting prizes if you attain first position on leaderboard. <a href="{{URL::to('/')}}"></a> </div>
                            <span class="sign_up_imp"><img src="{{URL::to('/img/sign-up_imp6.png')}}" alt=""/></span>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    </div>

@endsection