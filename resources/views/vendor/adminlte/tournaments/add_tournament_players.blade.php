@extends('adminlte::layouts.app')
<?php //dd($players_list);?>
@section('htmlheader_title')
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tournament Name: {{$players_list['name']}}
                        ({{$players_list['tournament_game']['name']}})</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['url' => route('postAddTournamentPlayers'),'files'=>true]) !!}
                    <input type="hidden" name="tournament_id" value="{{$players_list['id']}}"/>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <tr>
                                <th>&nbsp;</th>
                                <th>Player</th>
                                <th>Player price for this tournament</th>
                            </tr>
                            @php($counter = 0)
                            @foreach($players_list['tournament_game']['game_players'] as $row)
                            <tr>
                                <td>
                                    {{$row['id']}}
                                    <?php
                                    $playerPrice = 0;
                                    if (!empty(searchInMultiArray($row['id'], 'id', $players_list['tournament_players']))) {
                                        $playerPrice = searchInMultiArray($row['id'], 'id', $players_list['tournament_players'])['pivot']['player_price'];
                                    }
                                    ?>
                                    <input type="checkbox"
                                           name="player_tournament[{{$counter}}][player_id]" checked
                                           value="{{$row['id']}}"/>
                                    <input type="hidden" name="player_tournament[{{$counter}}][tournament_id]"
                                           value="{{$players_list['id']}}"/>
                                </td>
                                <td>
                                    <h4 class="media-heading">{{$row['name']}}</h4>
                                    <img class="img-md" src="{{getUploadsPath($row['profile_pic'])}}"/>
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        name="player_tournament[{{$counter}}][player_price]"
                                        class="form-control"
                                        value="{{$playerPrice}}"/>
                                </td>
                            </tr>
                            @php($counter++)
                            @endforeach
                        </table>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success">Add</button>
                    </div>

                    {!! Form::close() !!}
                    <div class="pagination">
                        <ul class="pagination">
                            @for($i=1; $i <= $totalPages; $i++)
                            <li>
                                <a href="{{route('showAddPlayerForm', ['tournament_id'=>$tournament_id])}}?page={{$i}}">{{$i}}</a>
                            </li>
                            @endfor
                        </ul>
                    </div>
                </div>
                <!--/.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
@endsection
