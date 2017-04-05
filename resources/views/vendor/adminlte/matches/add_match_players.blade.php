@extends('adminlte::layouts.app')
<?php //matchTournamentPlayers?>
@section('htmlheader_title')
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Match Name:{{$matchTournamentPlayers['name']}} <br> Tournament Name:{{$matchTournamentPlayers['match_tournament']['name']}}   </h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['url' => route('postAddMatchPlayers',['match_id'=>$matchTournamentPlayers['match_tournament']['id']]),'files' => true])
                    !!}
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">

                            <tr>
                                <th>&nbsp;Pic</th>
                                <th>Player</th>

                            </tr>
                         @foreach($matchTournamentPlayers['match_tournament']['tournament_players'] as $key=>$val)
                            <tr>
                                <td>
                                <div class="form-group">

                                    <input
                                        <?php
                                        foreach ($existingPlayers as $row){
                                        echo (in_array($val['id'],$row )) ? 'checked' : '';
                                                }

                                        ?>
                                            type="checkbox"
                                           name="player[]" value="{{$val['id']}}">


                                </div>


                                </td>
                                <td>
                                    <input type="hidden" /> {{$val['name']}}
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
