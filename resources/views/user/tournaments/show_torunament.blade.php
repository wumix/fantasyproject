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
                    <div class="col-md-12">
                        <h3 class="text-center">Tournament players</h3>
                        <div class="table-responsive">
                            <div class="panel with-nav-tabs panel">
                                <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        @foreach($game_roles as $key => $val)

                                        @if(!$role_id)
                                        <li class="active">
                                            <a href="{{route('showTournament', ['tournament_id'=>$tournament['id']])}}?role-id={{$val['id']}}" data-toggle="link">
                                                {{$val['name']}}
                                            </a>
                                        </li>
                                        @else
                                        <li class="{!! ($role_id == $val['id']) ? 'active':'' !!}">
                                            <a href="{{route('showTournament', ['tournament_id'=>$tournament['id']])}}?role-id={{$val['id']}}" data-toggle="link">
                                                {{$val['name']}}
                                            </a>
                                        </li>
                                        @endif

                                        <!--
                                        Tabs with fadeawa
                                        <li class="{!! ($key == 0) ? 'active':'' !!}">
                                                                                    <a href="#action-{{$val['id']}}" data-toggle="tab">
                                                                                        {{$val['name']}}
                                                                                    </a>
                                                                                </li>-->
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            <div class="table-responsive col-md-12">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Player</th>
                                                            <th>Points to buy</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-has-player">
                                                        @php($role_players = tapArray($game_roles, ['id' => $role_id]))
                                                        @if(!empty($role_players['players']))
                                                        @foreach($role_players['players'] as $key => $player)
                                                        <tr  class="cwt">
                                                            <td class="text-left">
                                                                <img src="{{getUploadsPath($player['profile_pic'])}}" class="player_pic img-thumbnail" />
                                                                {{$player['name']}}
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $playerThisTournamnetPrice = 0;
                                                                if(!empty($player['player_tournaments'][0]['pivot'])){
                                                                    $playerThisTournamnetPrice = $player['player_tournaments'][0]['pivot']['player_price'];
                                                                }
                                                                ?>
                                                                {{$playerThisTournamnetPrice}}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
