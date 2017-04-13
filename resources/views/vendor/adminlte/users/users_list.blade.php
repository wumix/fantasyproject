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
                    <h3 class="box-title">List of users</h3>
                    <span class="pull-right">
                        Total users: {{$users_list->total()}}
                    </span>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>User name</th>
                                <th>User email</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($users_list as $row)
                            <tr>
                                <td>
                                    {{$row['name']}}
                                </td>
                                <td>
                                    {{$row['email']}}
                                </td>
                                <td>
                                    <a href="{{route('usersTeam', ['user_id'=>$row['id']])}}" class="btn btn-primary">
                                        Teams
                                    </a>
                                    <a href="{{route('editUser', ['user_id'=>$row['id']])}}" class="btn btn-warning">
                                        <i class="fa fa-pencil"></i> Edit user
                                    </a>      
                                    <a href="#" class="btn btn-danger">
                                        <i class="fa fa-times"></i> Delete user
                                    </a>  
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    {{$users_list->links()}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
@endsection