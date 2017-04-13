@extends('adminlte::layouts.app')

@section('htmlheader_title')
User team
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Team Name: {{$user_team['name']}}</h3>
                </div>
                <div class="box-body">
                    <h4>Players</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>Player image</th>
                                <th>Player name</th>
                            </tr>
                            @foreach($user_team['user_team_player'] as $row)
                            <tr>
                                <td>
                                    <img src='{{getUploadsPath($row['profile_pic'])}}' />
                                </td>
                                <td>
                                    {{$row['name']}}
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