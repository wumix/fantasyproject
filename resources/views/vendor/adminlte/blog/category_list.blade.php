@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Categories list
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Blogs
                        </h3>
                    </div>
                    <div class="box-body">
                        @if(count($posts) > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>
                                            Name
                                        </td>
                                        <td>
                                           Description
                                        </td>
                                    </tr>
                                @foreach($posts as $blogposts)
                                    <tr>
                                     <td>   {{$blogposts['name']}}</td>
                                        <td>   {{$blogposts['description']}}</td>
                                    </tr>

                                @endforeach
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">
                                No blog found.
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