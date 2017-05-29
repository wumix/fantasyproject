@extends('layouts.app')
@section('title')
    How to play Gamithon Fantasy
@stop
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        How to play
                    </h1>
                    <hr class="light full">
                    <div class="page-content">
                        <ol class="how-play">
                            <li>
                                Just Sign up for an account
                            </li>
                            <li>
                                Go for create The Team
                            </li>
                            <li>
                                Settle on your tournament
                            </li>
                            <li>
                                Create your own Fantasy team with your favorite players in the tournament.


                            </li>
                            <li>
                                Every new user earns free 100,000 points

                            </li>
                            <li>
                                Catch your points when your players score runs, take wickets, etc

                            </li>
                            <li>
                                You can win exciting prizes once you make your way into the leader board
                            </li>
                            <li>
                                If you win you will be surprised with the Prize -<strong><a style="color: black"
                                                                                            href="{{route('TermsCon')}}">Terms
                                        &amp; Conditions</a></strong> Apply
                            </li>
                        </ol>
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
                                                <div class="tab-pane {!! ($key == 0) ? 'active':'' !!}"
                                                     id="action-{{$val['id']}}">
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
                                                                    <tr class="cwt">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop