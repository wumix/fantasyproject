@extends('adminlte::layouts.app')

@section('htmlheader_title')
Blog list
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
                        <table class="table table-hover table-bordered">
                            <tr>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            @foreach($posts as $post)
                            <tr>
                                <td>
                                    <a href="">
                                        {{$post['title']}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('editPost', ['blog_id'=>$post['id']])}}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <a href="" class="btn btn-danger" onclick="return confirm('Sure you wana delete this ***!')">
                                        Delete
                                    </a>
                                </td>
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