@extends('layouts.app')
{{--{{dd($matches->t)}}--}}
@section('title')
    How To Play at Gamithon Fantasy
@stop
@section('meta-keywords')

<meta name="description" content="It's a skill-based game that makes you experience the thrill. You will have to select a team of 11 players all over the world. Winners get exciting cash prizes!">
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