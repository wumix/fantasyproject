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
                        Score of <strong>{{$player['name']}}</strong> in match <strong>{{$match['name']}}</strong>
                    </h3>
                    <div class="pull-right">
                        <img src="{{getUploadsPath($player['profile_pic'])}}" class="img-thumbnail" />
                    </div>
                </div>
                <div class="box-body">
                    @include('adminlte::layouts.form_errors')
                    {!! Form::open(['url' => route('postPlayerMatchScore',['match_id'=>$match_id, 'player_id'=>$player['id']]),'files'=>true]) !!}
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            @foreach($game_actions as $ga_key => $ga_val)
                            <tr>
                                <td colspan="2">
                                    <strong>{{$ga_val['name']}}</strong>
                                </td>
                            </tr>
                            @foreach($ga_val['game_terms'] as $term_key => $term_val)
                            @php($playerScore = 0)
                            @php($playerTermScore = tapArray($match['player_scores'], ['game_term_id'=>$term_val['id']]))
                            @if(!empty($playerTermScore['player_term_count']))
                            @php($playerScore = $playerTermScore['player_term_count'])
                            @endif
                            <tr>
                                
                                <td>
                                    {{$term_val['name']}}
                                </td>
                                <td>
                                    <input 
                                        class="form-control" 
                                        name="term_score[{{$term_val['id']}}]"
                                        value="{{$playerScore}}"
                                        />
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="text-center">
                                    - - - - - - - - - - - -
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
