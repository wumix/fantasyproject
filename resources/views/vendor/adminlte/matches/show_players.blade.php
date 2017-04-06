@extends('adminlte::layouts.app')

@section('htmlheader_title')
Players of match
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Match players; {{$players['name']}}
                    </h3>
                </div>
                <div class="box-body">
                    @if(!empty($players['match_players']))
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <tr>
                                <td>Player</td>
                                <td>Actions</td>
                            </tr>

                            @foreach($players['match_players'] as $key => $val)
                            <tr>
                                <td>
                                    {{$val['name']}}
                                </td>
                                <td>
                                    <a href="{{route('addPlayerMatchScore', ['match_id' => $players['id'], 'player_id'=>$val['id']])}}" class="btn btn-success">
                                        Add/update score
                                    </a>
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