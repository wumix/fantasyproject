@extends('adminlte::layouts.app')

@section('htmlheader_title')
Games
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">List of Players</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>Player Name</th>
                                <th colspan="3">Actions</th>
                            </tr>
                            @foreach($player_list as $row)

                            <tr>
                                <td>
                                    {{$row['name']}}
                                </td>
                                <td>
                                    <a href="{{route('editPlayerForm', ['player_id'=>$row['id']])}}" class="btn btn-warning">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>      
                                    <a href="#" class="btn btn-danger">
                                        <i class="fa fa-times"></i> Delete
                                    </a>
                                    <a href="{{route('showAddStatForm', ['player_id'=>$row['id']])}}" class="btn btn-danger">
                                        <i class="fa fa-times"></i> Player Rankings
                                    </a>
                                    <a href="{{route('addPlayerStats', ['player_id'=>$row['id']])}}" class="btn btn-danger">
                                        <i class="fa fa-times"></i> Player Stats
                                    </a>

                                </td>


                            </tr>
                            @endforeach

                        </table>
                    </div>
                    {{ $player_list->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
@endsection