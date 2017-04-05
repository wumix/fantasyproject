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
                                        <th class="border-r th1">PLAYER</th>
                                        <th class="border-r">PLAYER ROLE</th>
                                        <th class="th2">POINTS NEEDED TO BUY</th>
                                    </tr>
                                </thead>
                                <tbody class="main-taible-body">

                                    @foreach($tournament_detail['tournament_players'] as $player)
                                    <tr class="cwt">
                                        <td class="border-r text-left">
                                            <span class="text-left"><img id="timg" class="img-thumbnail" src="{{ getUploadsPath($player['profile_pic']) }}"></span>
                                            <span class="text-right" style="margin-left: 10px;">{{$player['name']}}</span>
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
                                                                @php($fromToText = ': '.$termPointVal['qty_from'].' - '.str_replace('99999999', 'Above', $termPointVal['qty_to']))
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
<!-- ...............................News start......................... -->
@endsection
