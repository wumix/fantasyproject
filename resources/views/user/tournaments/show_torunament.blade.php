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
                        <h3 class="ah3" id="ah31">{{$tournament_detail['name']}}</h3>
                    </div>
                    <div class="btnbb col-md-4">

                        <a href="{{route('addTeam', ['tournament_id'=>$tournament_detail['id']])}}" style="text-transform: uppercase" class="btn btn-md bttor">PLAY THIS TOURNAMENT IN  {{$tournament_detail['tournament_price']}} points</a>
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

                        @foreach($tournament_detail['tournament_players'] as $player)
                        <tr class="cwt">
                            <td class="border-r" ><img id="timg" class="img-circle" src="{{ getUploadsPath($player['profile_pic']) }}"> {{$player['name']}}</td>
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
    <!-- ............................Show Hide Table Satrt........................... -->
<!--    <section>
        <div class="container">
            <h3 class="ah3">COMPLETED MATCHES</h3>
            <div class="text-center col-md-10 col-md-offset-1 mrgg">
                <div class="accordian-table-header">
                    <ul class="match-accordian-header row">
                        <li class="col-md-3">Match</li>
                        <li class="col-md-3">Mumbai</li>
                        <li class="col-md-3">1 april  </li>
                        <li class="col-md-2">3pm  </li>
                        <li class="col-md-1"><span class="btn-toggle">+</span></li>
                    </ul>
                </div>
                <div class=" col-md-11  mrgg">
                    <div class="col-md-3 ftp">PLAYERS</div>
                    <div class="col-md-3 ftp">ROLE</div>
                    <div class="col-md-5 ftp">TOTAL POINTS IN THIS TOURNAMENT</div>
                </div>
                <div class=" col-md-11  mrgg11">
                    <div class="col-md-3 ftp1"><img id="timg" class="img-circle" src="psl-images/aa.jpeg"> Cris Gayle</div>
                    <div class="col-md-3 ftp11">Batsman</div>
                    <div class="col-md-5 ftp11">40000</div>
                    <div class="col-md-1 ftp11"><span class="btn-toggle">+</span></div>
                </div>
                <div class=" col-md-11  mrgg1">
                    <div class="col-md-3 ftp1"><img id="timg" class="img-circle" src="psl-images/aa.jpeg"> Cris Gayle</div>
                    <div class="col-md-3 ftp11">Batsman</div>
                    <div class="col-md-5 ftp11">40000</div>
                    <div class="col-md-1 ftp11"><span class="btn-toggle">+</span></div>
                </div>
                <div class=" col-md-11  mrgg1">
                    <div class="col-md-3 ftp1"><img id="timg" class="img-circle" src="psl-images/aa.jpeg"> Cris Gayle</div>
                    <div class="col-md-3 ftp11">Batsman</div>
                    <div class="col-md-5 ftp11">40000</div>
                    <div class="col-md-1 ftp11"><span class="btn-toggle">+</span></div>
                </div>
                <div class=" col-md-11  mrgg1">
                    <div class="col-md-3 ftp1"><img id="timg" class="img-circle" src="psl-images/aa.jpeg"> Cris Gayle</div>
                    <div class="col-md-3 ftp11">Batsman</div>
                    <div class="col-md-5 ftp11">40000</div>
                    <div class="col-md-1 ftp11"><span class="btn-toggle">+</span></div>
                </div>
                <div class="tablety"></div>
                <div class="accordian-table-header">
                    <ul class="match-accordian-header row">
                        <li class="col-md-3">Match</li>
                        <li class="col-md-3">Mumbai</li>
                        <li class="col-md-3">1 april  </li>
                        <li class="col-md-2">3pm  </li>
                        <li class="col-md-1"><span class="btn-toggle">+</span></li>
                    </ul>

                </div>
                <div class="accordian-table-header " id="matr">
                    <ul class="match-accordian-header row">
                        <li class="col-md-3">Match</li>
                        <li class="col-md-3">Mumbai</li>
                        <li class="col-md-3">1 april  </li>
                        <li class="col-md-2">3pm  </li>
                        <li class="col-md-1"><span class="btn-toggle">+</span></li>
                    </ul>
                </div>
                <div class="tabletyg"></div>
            </div>
        </div>
        <div class="container">
            <h3 class="ah3">UPCOMING MATCHES</h3>
            <div class="text-center col-md-10 col-md-offset-1 mrgg">
                <div class="accordian-table-header">
                    <ul class="match-accordian-header row">
                        <li class="col-md-3">Match</li>
                        <li class="col-md-3">Mumbai</li>
                        <li class="col-md-3">1 april  </li>
                        <li class="col-md-2">3pm  </li>
                        <li class="col-md-1"><span class="btn-toggle">+</span></li>
                    </ul>
                </div>

                <div class="tablety"></div>
                <div class="accordian-table-header">
                    <ul class="match-accordian-header row">
                        <li class="col-md-3">Match</li>
                        <li class="col-md-3">Mumbai</li>
                        <li class="col-md-3">1 april  </li>
                        <li class="col-md-2">3pm  </li>
                        <li class="col-md-1"><span class="btn-toggle">+</span></li>
                    </ul>

                </div>
                <div class="accordian-table-header " id="matr">
                    <ul class="match-accordian-header row">
                        <li class="col-md-3">Match</li>
                        <li class="col-md-3">Mumbai</li>
                        <li class="col-md-3">1 april  </li>
                        <li class="col-md-2">3pm  </li>
                        <li class="col-md-1"><span class="btn-toggle">+</span></li>
                    </ul>
                </div>
                <div class="tabletyg"></div>
            </div>
        </div>
    </section>-->
    <!-- ............................Show Hide Table End........................... -->
</div>
<!-- ...............................News start......................... -->
@endsection
