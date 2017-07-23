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
                        <h3 class="box-title">Category list</h3>
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
                                           <a class="btn btn-success" href="{{route('editcategory',['id'=>$row['id']])}}">Edit</a>

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