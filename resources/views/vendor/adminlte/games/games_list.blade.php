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
                    <h3 class="box-title">Games</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>Game Name</th>
                                <th colspan="3">Actions</th>
                            </tr>
                            @foreach($games_list as $row)

                            <tr>
                                <td>
                                    {{$row['name']}}
                                </td>
                                <td>
                                    <a href="{{route('editGameForm', ['game_id'=>$row['id']])}}" class="btn btn-warning">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>      
                                    <a href="{{route('deleteGame', ['game_id'=>$row['id']])}}" class="btn btn-danger">
                                        <i class="fa fa-times"></i> Delete
                                    </a>
                                    <a href="{{route('showGameFormats', ['game_id'=>$row['id']])}}" class="btn btn-danger">
                                        <i class="fa fa-times"></i> Add Format Stat Names(i.e match,inns)
                                    </a>
                                    <a href="{{route('addGameFormat', ['game_id'=>$row['id']])}}" class="btn btn-danger">
                                        <i class="fa fa-times"></i> Add Game Format (i.e T20,Test)
                                    </a>

                                    
                                </td>
                                

                            </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
@endsection