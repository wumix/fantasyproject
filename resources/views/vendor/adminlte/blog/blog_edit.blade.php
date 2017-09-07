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
                        <h3 class="box-title">Add post</h3>
                        @include('adminlte::layouts.form_errors')
                    </div>
                    {!! Form::open(['url' => route('postAddPost',['blog_id'=>$blog['id']]),'id'=>'post-edit-frm']) !!}
                    <div class="box-body">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Post title</label>
                                <input required class="form-control" value="{{$blog['title']}}" name="title" required/>
                            </div>

                            <div class="form-group">
                                <label>Post description (This will be show in meta)</label>
                                <textarea class="form-control textarea"
                                          name="description">{{$blog['description']}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Post Content</label>
                                <textarea class="form-control wysiwyg textarea" name="content"
                                          id="content">{{$blog['content']}} </textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        Post Category
                                    </h3>
                                </div>
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label>
                                            @if($blog['post_type']=="news")
                                                <input checked type="radio" name="post_type" value="{{$blog['post_type']}}"/>News<br/>
                                                <input  type="radio" name="post_type" value="post"/>Blog
                                            @endif
                                            @if($blog['post_type']=="post")
                                                <input checked type="radio" name="post_type" value="{{$blog['post_type']}}"/>Blog<br/>
                                                    <input  type="radio" name="post_type" value="news"/>News
                                            @endif


                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        Post image
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="input-append">
                                            <input class="form-control" id="post_image" value="{{$blog['image']}}"
                                                   name="image" type="text">
                                            <a data-toggle="modal" href="javascript:;" data-target="#galleryModal"
                                               class="btn btn-primary" type="button">
                                                Select
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="submit"/>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>


    <div class="modal fade" id="galleryModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add post</h4>
                </div>
                <div class="modal-body">
                    <iframe width="100%" height="800"
                            src="{{URL::to("filemanager/dialog.php?type=1&field_id=post_image")}}" frameborder="0"
                            style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('js')
    {!! Html::script('js/tinymce/tinymce.min.js'); !!}
    {!! Html::script('js/tinymce.js'); !!}
    <script>
        function responsive_filemanager_callback(field_id) {
// $('#galleryModal').modal('hide')
//your code
        }
    </script>
@stop