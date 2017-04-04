@php
    //dd($tournament_detail);
@endphp
@extends('layouts.app')

@section('content')
    <!-- ............................Tournament  Start.................................. -->
    <div>
        <section>
            <div class="container mrg">

                <div class='row'>
                    <div class='col-md-12'>
                        <div class="carousel slide media-carousel" id="media">
                            <div class="carousel-inner">
                                <div class="item  active">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>

                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>

                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                            <a data-slide="next" href="#media" class="right carousel-control">›</a>
                        </div>
                    </div>
                </div>

                <hr class="hrt">

            </div>
        </section>

        <!-- ............................Tournament  End.................................. -->
        <!-- .........................................Google Add Start........................ -->

        <!-- ......................................Google Add End................................. -->
        <!-- ..............................Table Start................................... -->
        <section>
            <div class="container-fluid ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8" id="ah31">
                            <h3 class="ah3" id="ah31">{{$tournament_detail['name']}}</h3>
                        </div>
                        <div class="btnbb col-md-4">

                            <a href="{{route('addTeam', ['tournament_id'=>$tournament_detail['id']])}}"
                               style="text-transform: uppercase" class="btn btn-md bttor">PLAY THIS TOURNAMENT
                                IN {{$tournament_detail['tournament_price']}} points</a>
                        </div>

                    </div>

                    <table class="table table-striped" id="tortable">
                        <thead class="main-taible-head">
                        <tr>
                            <th class="border-r th1">PLAYER NAME</th>
                            <th class="border-r">PLAYER ROLE</th>

                            <th class="th2">POINTS NEEDED TO BUY</th>
                        </tr>
                        </thead>
                        <tbody class="main-taible-body">

                        @foreach($tournament_detail['tournament_players'] as $player)
                            <tr class="cwt">
                                <td class="border-r"><img id="timg" class="img-circle"
                                                          src="{{ getUploadsPath($player['profile_pic']) }}"> {{$player['name']}}
                                </td>
                                <td class="border-r">Batsman</td>
                                <td class="brr">{{$player['pivot']['player_price']}}</td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- ...............Table End.............................. -->
        <!--rules start -->
        <section>

            <div class="container">


                <div class="panel with-nav-tabs panel">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            @foreach($tournament['tournament_game']['game_actions'] as $key=>$row)
                                <li id="tbbox-{{$key}}" class="{!! ($key == 0) ? 'active':'' !!}">
                                    <a id="tabt-{{$key}}" href="#tab{{$row['id']}}default"
                                       data-toggle="tab">{{$row['name']}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            @foreach($tournament['tournament_game']['game_actions'] as $row)
                                <div class="tab-pane fade {!! ($key == 0) ? 'in active':'' !!}"
                                     id="tab{{$row['id']}}default">
                                    <div class="col-md-11 tcen ">
                                        <table class="table " id="tortable">
                                            <thead class="main-taible-head1">
                                            <tr>


                                                <th class=" th1">Rule</th>

                                                <th class="point">To</th>
                                                <th class="point">From</th>
                                                <th class="add">Points</th>
                                            </tr>
                                            </thead>
                                            <tbody class="main-taible-body">
                                            @php
                                                $test=[];
                                                foreach($row['game_terms']  as $krow ){
                                                 foreach($tournament['game_term_points']  as $row ){
                                                 if($row['game_term_id']==$krow['id']){
                                                 $test[]=$row;
                                                 }


                                                }
                                            @endphp
                                            @foreach($test as $z)
                                                <tr  class="cwt">

                                                    <td class=" point"><p class="myteamtt">{{$krow['name']}}
                                                        </p></td>

                                                    <td class=" point"><p class="myteamtt">{{$z['qty_from']}}
                                                        </p></td>

                                                    <td class=" point"><p class="myteamtt">{{$z['qty_to']}}
                                                        </p></td>

                                                    <td class=" point"><p class="myteamtt">{{$z['points']}}
                                                        </p></td>



                                                </tr>
                                            @endforeach

                                            @php
                                                }
                                            @endphp


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
    <!-- ...............................News start......................... -->
@endsection
