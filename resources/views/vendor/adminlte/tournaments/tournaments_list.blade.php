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
                    <h3 class="box-title">List of Players</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>Player Name</th>
                                <th colspan="3">Actions</th>
                            </tr>
                            @foreach($tournaments_list as $row)

                            <tr>
                                <td>
                                    {{$row['name']}}
                                </td>
                                <td>
                                   <a href="{{route('editTournamentForm', ['tournament_id'=>$row['id']])}}" class="btn btn-warning">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>      
                                    <a href="#" class="btn btn-danger">
                                        <i class="fa fa-times"></i> Delete
                                    </a>  
                                    <a href="{{route('showAddPlayerForm', ['tournament_id'=>$row['id']])}}" class="btn btn-danger">
                                        <i class="fa fa-times"></i> Add Players
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