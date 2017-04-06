@extends('adminlte::layouts.app')

@section('htmlheader_title')
<?php //dd($matches_list)?>
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">List of Matches</h3>
                    <div class="pull-right">
                        <label>Tournament</label>
                        <select class="form-control" onchange="chnageTournament(this.value)">
                            <option value="">Select Tournament</option>
                            @foreach($tournaments as $tournament)
                            <option {!! ($tournamentId == $tournament['id'])?'selected':'' !!} value="{{$tournament['id']}}">{{$tournament['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="box-body">
                    @if(!empty($tournamentId))
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>Match Name</th>
                                <th colspan="3">Actions</th>
                            </tr>
                            @foreach($matches_list as $row)

                            <tr>
                                <td>
                                    {{$row['name']}}
                                </td>
                                <td>
                                    <a href="{{route('editMatchForm', ['match_id'=>$row['id']])}}" class="btn btn-warning">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>      
                                    <a href="{{route('showMatchPlayers', ['match_id'=>$row['id']])}}" class="btn btn-primary">
                                        Show players and update score
                                    </a>
                                    <a href="{{route('showAddMatchPlayerForm', ['match_id'=>$row['id']])}}" class="btn btn-success">
                                        Add Players
                                    </a>
                                    <!--                                    <a href="#" class="btn btn-danger">
                                                                            <i class="fa fa-times"></i> Delete
                                                                        </a>-->
                                </td>


                            </tr>
                            @endforeach

                        </table>
                    </div>
                    @else
                    <div class="alert alert-info">
                        Please select tournament first.
                    </div>
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function chnageTournament(tournamentId) {
        window.location = "{{route('Matcheslist')}}?tournament_id=" + tournamentId;
    }
</script>
@stop