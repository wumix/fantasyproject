<?php
//dd($team_id);
?>
@extends('adminlte::layouts.app')
@section('htmlheader_title')
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->

                <div class="box">
                    <div class="box-header with-border">
                        <h3>
                            {{$tournament_team['name']}}
                        </h3>
                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => route('postAddTeamPlayers',['team_id'=>$team_id]),'files'=>true]) !!}
                        <input type="hidden" name="tournament_id" value=""/>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>Player</th>
                                    <th>Player Name</th>
                                </tr>
                                @foreach($players as $player)

                                    <tr>

                                        <td>


                                            <input type="checkbox"
                                                   name="player_id[]"
                                                   {!! in_array($player['id'], $players_in_team) ? 'checked':'checked' !!}
                                                   value="{{$player['id']}}"/>
                                        </td>
                                        <td>
                                            <h4 class="media-heading"></h4>
                                            <img class="img-md" src="{{getUploadsPath($player['profile_pic'])}}"/>
                                        </td>
                                        <td>
                                            {{$player['name']}}
                                        </td>
                                    </tr>
                                @endforeach


                            </table>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>

                    </div>
                    <!--/.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
@endsection
