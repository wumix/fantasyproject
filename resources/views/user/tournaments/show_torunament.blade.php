@php
//dd($tournament_detail);
@endphp
@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-heading">
                    {{$tournament_detail['name']}}
                </h1>
                <hr class="light full">
                <div class="page-content">
                    <div class="btnbb col-md-12">
                        <a href="{{route('addTeam', ['tournament_id'=>$tournament_detail['id']])}}"
                           style="text-transform: uppercase" class="btn btn-orange">PLAY THIS TOURNAMENT
                            IN {{$tournament_detail['tournament_price']}} 
                            points
                        </a>
                    </div>

                    
                    <div class="col-md-12 mt26">
                        <div class="table-responsive">
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



                    
                    <div class="col-md-12">
                        <h3 class="text-center">Score rules</h3>
                        <div class="table-responsive">
                            <div class="panel with-nav-tabs panel">
                                <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        @foreach($tournament['tournament_game']['game_actions'] as $key=>$row)
                                        <li id="tbbox" class="{!! ($key == 0) ? 'active':'' !!}">
                                            <a id="tabt" href="#tab{{$row['id']}}default"
                                               data-toggle="tab">{{$row['name']}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">

                                        @foreach($tournament['tournament_game']['game_actions'] as $key=>$row)

                                        <div class="tab-pane fade {!! ($key == 0) ? 'in active':'' !!}"
                                             id="tab{{$row['id']}}default">
                                            <div class="table-responsive col-md-12">
                                                <table class="table " id="tortable">
                                                    <thead>
                                                        <tr>


                                                            <th>Rule</th>


                                                            <th>Points</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
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

                                                            <td>{{$krow['name']}}
                                                                {{$z['qty_from']}} to {{$z['qty_to']}}
                                                            </td>



                                                            <td>{{$z['points']}}
                                                            </td>



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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ...............................News start......................... -->
@endsection
