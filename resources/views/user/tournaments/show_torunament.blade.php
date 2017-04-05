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
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ...............................News start......................... -->
@endsection
