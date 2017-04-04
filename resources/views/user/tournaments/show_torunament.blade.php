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
                                        <a class="img-rounded" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="img-rounded" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="img-rounded" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="img-rounded" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="img-rounded" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="img-rounded" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                    </div>

                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-md-2">
                                        <a class="img-rounded" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="img-rounded" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="img-rounded" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="img-rounded" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="img-rounded" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="img-rounded" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                    </div>

                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-md-2">
                                        <a class="img-rounded" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="img-rounded" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="img-rounded" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="img-rounded" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="img-rounded" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="img-rounded" href="#"><img alt="" src="http://placehold.it/150x150"></a>
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
                        <h3 class="ah3" id="ah31"></h3>
                    </div>
                    <div class="btnbb col-md-4">

                        <a href="#" style="text-transform: uppercase" class="btn btn-md bttor">PLAY THIS TOURNAMENT IN   points</a>
                    </div>

                </div>

                <table class="table table-striped" id="tortable">
                    <thead class="main-taible-head" >
                        <tr>
                            <th class="border-r th1">PLAYER NAME</th>
                            <th class="border-r">PLAYER ROLE</th>

                            <th class="th2">POINTS NEEDED TO BUY</th>
                        </tr>
                    </thead>
                    <tbody class="main-taible-body">


                        <tr class="cwt">
                            <td class="border-r" ><img id="timg" class="img-circle" src="#">asdada</td>
                            <td class="border-r">Batsman</td>
                            <td class="brr">adad</td>

                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- ...............Table End.............................. -->
    <!-- ............................Show Hide Table Satrt........................... -->
    <section>

        <div class="container">
            <span id="your_points">  Your Points: </span>

            <div class="panel with-nav-tabs panel">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">

                        @foreach($roles as $key => $role)

                            <li id="tbbox-{{$key}}" class="{!! ($key == 0) ? 'active':'' !!}">
                                <a id="tabt-{{$key}}" href="#tab{{$role['id']}}default"
                                   data-toggle="tab">{{$role['name']}}</a>
                            </li>

                        @endforeach
                    </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        {{--first div--}}
                        @foreach($roles as $key=>$role)
                            <div class="tab-pane fade {!! ($key == 0) ? 'in active':'' !!}"
                                 id="tab{{$role['id']}}default">
                                <div class="col-md-11 tcen ">
                                    <table class="table " id="tortable">
                                        <thead class="main-taible-head1">
                                        <tr>
                                            <th class=" th1">PLAYERS</th>

                                            <th class="point">PRICE</th>
                                            <th class="add">ADD</th>
                                        </tr>
                                        </thead>
                                        <tbody class="main-taible-body">

                                        @foreach($role['players'] as $player)
                                            <tr id="player_tr-{{$player['id']}}" class="cwt">
                                                <td class=" th11"><img id="myteamtimg" class="img-circle"
                                                                       src="{{getUploadsPath($player['profile_pic'])}}"/>
                                                    <span class="selected-player-name"> {{$player['name']}}</span>
                                                </td>

                                                <td class=" point"><p
                                                            class="myteamtt">{{$player['player_tournaments'][0]['pivot']['player_price']}}</p>
                                                </td>

                                                <td class="add">
                                                    <a id="btn-player-{{$player['id']}}"
                                                       href="javascript:addplayertoteam('{{$role['name']}}','{{$role['id']}}','{{$player['id']}}','{{$player['player_tournaments'][0]['id']}}','{{$player['player_tournaments'][0]['pivot']['player_price']}}')"
                                                       class="btn btn-md bttor1">Add To
                                                        Team
                                                    </a>
                                                </td>


                                            </tr>
                                        @endforeach

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
    <!-- ............................Show Hide Table End........................... -->
</div>
<!-- ...............................News start......................... -->
@endsection
