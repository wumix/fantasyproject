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
                    How to play
                </h1>
                <hr class="light full">
            </div>
            <div class="how_play_sec">
                <div class="col-md-12 no-padding">
                    <ul>
                        <li>
                            <div class="sign_text">1. <span>Sign up</span> for an account</div>
                            <span class="sign_up_imp"><img src={{URL::to('/img/sign-up_imp.png')}} alt=""/></span>
                        </li>
                        <li>
                            <div class="sign_text">2. Go for <span>Create The Team</span></div>
                            <span class="sign_up_imp"><img src={{URL::to('/img/sign-up_imp2.png')}} alt=""/></span>
                        </li>
                        <li>
                            <div class="sign_text">3. Create your own Fantasy team with your <span>Favorite Players</span> in the tournament</div>
                            <span class="sign_up_imp"><img src={{URL::to('/img/sign-up_imp3.png')}} alt=""/></span>
                        </li>
                        <li>
                            <div class="sign_text">4. Every new user earns free <span>100,000</span> points</div>
                            <span class="sign_up_imp"><img src={{URL::to('/img/sign-up_imp4.png')}} alt=""/></span>
                        </li>
                        <li>
                            <div class="sign_text">5. Catch your <span>points</span> when your players score runs, take wickets, etc</div>
                            <span class="sign_up_imp"><img src={{URL::to('/img/sign-up_imp5.png')}} alt=""/></span>
                        </li>
                        <li>
                            <div class="sign_text">6. You can win exciting prizes once you make your way into the<span>leader board</span> </div>
                            <span class="sign_up_imp"><img src={{URL::to('/img/sign-up_imp6.png')}} alt=""/></span>
                        </li>
                        <li>
                            <div class="sign_text">7. If you win you will be surprised with the Prize<span>- Terms & Conditions </span> Apply</div>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="scorin_bord_sec">
                <div class="col-md-12">
                    <p>
                        What is fantasy Cricket?
                    </p>
                    <p>
                        It's a skill-based game that makes you experience the thrill of a coach who would go
                        through before playing every match - a real test of your cricketing skills, your
                        knowledge and understanding of player strengths and weaknesses.
                        You will have to select a team of 11 from a pool of players and compete with other users
                        from all over the world. Winners get exciting cash prizes!

                    </p>
                </div>
                <!--start -->
                <div class="col-md-12">
                    <h3 class="text-center">Score rules</h3>
                    <div class="table-responsive">
                        <div class="panel with-nav-tabs panel">
                            <div class="panel-heading">
                                <ul class="nav nav-tabs">
                                    @foreach($game_actions as $key => $val)
                                        <li class="{!! ($key == 0) ? 'active':'' !!}">
                                            <a href="#action-{{$val['id']}}" data-toggle="tab">
                                                {{$val['name']}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    @foreach($game_actions as $key => $val)
                                        <div class="tab-pane {!! ($key == 0) ? 'active':'' !!}" id="action-{{$val['id']}}">
                                            <div class="table-responsive col-md-12">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Rule</th>
                                                        <th>Points</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($val['game_terms'] as $key => $val)
                                                        <?php
                                                        $termFromToPoints = tapArray($tournament['game_term_points'], ['game_term_id' => $val['id']], false);
                                                        ?>
                                                        @foreach($termFromToPoints as $termPointIndex => $termPointVal)
                                                            <tr  class="cwt">
                                                                <td>
                                                                    <?php
                                                                    $qtyToTxt = ($termPointVal['qty_to'] > 999) ? 'Above' : $termPointVal['qty_to'];
                                                                    ?>
                                                                    @php($fromToText = ': '.$termPointVal['qty_from'].' - '.$qtyToTxt)
                                                                    @if($termPointVal['qty_from']-$termPointVal['qty_to'] == 0)
                                                                        @php($fromToText = '')
                                                                    @endif
                                                                    {{$val['name']}} {{$fromToText}}
                                                                </td>
                                                                <td>
                                                                    {{$termPointVal['points']}}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                @endforeach<!--Game actions outer loop-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- tab end -->
            </div>
        </div>
    </div>

@endsection