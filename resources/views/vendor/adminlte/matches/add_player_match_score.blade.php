@extends('adminlte::layouts.app')
<?php //debugArr($players);die;?>
<?php //debugArr($game_terms);die;?>
@section('htmlheader_title')
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Add match player scores
                        <small>
                            ({{$tournament_name}} - {{$match_name}})
                        </small>
                    </h3>
                </div>
                <div class="box-body">
                    @include('adminlte::layouts.form_errors')
                    {!! Form::open(['url' => route('postAddMatchScore',['match_id'=>$match_id]),'files'=>true]) !!}
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            @php($player_counter = 0)
                            @foreach($players as $player)
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label><strong>{{$player['name']}} has: </strong></label>
                                        <div class="pull-right">
                                            @if(!empty($player['profile_pic']))
                                            <img class="img-md" src="{{ getUploadsPath($player['profile_pic']) }}"/>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                            <div class="form-group">
                                @php($term_counter = 0)
                                @foreach($game_terms['game_terms'] as $row)
                                @php($player_term_score = tapArray($player_scores, [
                                'player_id' => $player['id'],
                                'game_term_id' => $row['id']
                                ]))

                                @if(!empty($player_term_score))
                                @php($player_term_score = $player_term_score['player_term_count'])
                                @else
                                @php($player_term_score = 0)
                                @endif

                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label>{{$row['name']}}</label>
                                            <input type="text"
                                                   name="player_game_term_counter[{{$player_counter}}][{{$term_counter}}][player_term_count]"
                                                   value="{{$player_term_score}}"
                                                   class="form-control"/>
                                            <input type="hidden"
                                                   name="player_game_term_counter[{{$player_counter}}][{{$term_counter}}][game_term_id]"
                                                   value="{{$row['id']}}" class="form-control"/>
                                            <input type="hidden"
                                                   name="player_game_term_counter[{{$player_counter}}][{{$term_counter}}][player_id]"
                                                   value="{{$player['id']}}"/>
                                            <input type="hidden"
                                                   name="player_game_term_counter[{{$player_counter}}][{{$term_counter}}][match_id]"
                                                   value="{{$match_id}}"/>
                                        </div>
                                    </td>
                                </tr>
                                @php($term_counter++)
                                @endforeach
                            </div>

                            </tr>
                            @php($player_counter++)
                            <tr>
                                <td>

                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success">Add</button>
                    </div>
                    {!! Form::close() !!}

                </div>
                <!--/.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
@endsection
