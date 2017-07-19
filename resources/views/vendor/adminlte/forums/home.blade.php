@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Lists

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

                    </span>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>action</th>
                                    <th></th>
                                </tr>
                                @foreach($lists as $row)
                                    <tr>
                                        <td>
                                            {{$row['name']}}
                                        </td>
                                        <td>
                                            {{$row['description']}}
                                        </td>
                                        <td>
                                            <select>
                                                <option selected value="0">Un appproved</option>
                                                <option>{{$row['is_approved']}}</option>
                                            </select>

                                        </td>

                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        {{$lists->links()}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
@endsection